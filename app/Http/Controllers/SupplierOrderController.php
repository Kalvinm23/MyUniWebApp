<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\SupplierOrder;
use App\SupplierOrderDetails;
use App\Product;

class SupplierOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $supplier = Supplier::find($id);
        $orders = Supplier::find($id)->orders;

       return view('supplierorder.index')->with(compact('supplier', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $supplier = Supplier::find($id);
        $products = Product::where('supplier_id', '=' , $id)->where('quantity', '<', '6')->get();
        if(count($products) == 0){
            return redirect('/supplier/'.$id)->with('error', 'No Stock Needed to be Ordered.');

        }

        return view('supplierorder.create')->with(compact('products', 'supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

       
        //create supplier
        $supplierorder = new SupplierOrder;
        $supplierorder->supplier_id = $id;
        $supplierorder->status = 1;
        $supplierorder->save();

        for($count = 0; $count < count($product_id); $count++)
        {
            $data = array(
                'supplier_order_id' => $supplierorder->id,
                'product_id' => $product_id[$count],
                'quantity'  => $quantity[$count],
                'created_at'  => \Carbon\Carbon::now(),
                'updated_at'  => \Carbon\Carbon::now(),
            );
            $orderdetails[] = $data; 
        }
        SupplierOrderDetails::insert($orderdetails);

        return redirect('/supplierorder/'.$supplierorder->id.'/show')->with('success', 'Supplier Order Created'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $order = SupplierOrder::find($id);
        $supplier = Supplier::find($order->supplier_id);
        $products = SupplierOrder::find($id)->products;
       
        return view('supplierorder.show')->with(compact('order', 'products', 'supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {      
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        } 
        $order = SupplierOrder::find($id);
        $order->status = 3;
        $order->save();
        
        $orderproducts = SupplierOrder::find($id)->products;

        foreach($orderproducts as $orderproduct)
        {
            $product = Product::find($orderproduct->product_id);
            $product->increment('quantity', $orderproduct->quantity);
            $product->save();
        }

        return redirect('/supplierorder/'.$order->supplier_id)->with('success', 'Order Updated');
    }

}
