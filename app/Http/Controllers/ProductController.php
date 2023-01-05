<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Type;
use App\Brand;
use App\Supplier;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }

        $aproducts = Product::where('status', '=' , 1)->orderBy('name','asc')->paginate(9, ['*'], 'active');
        $iproducts = Product::where('status', '!=' , 1)->orderBy('name','asc')->paginate(9, ['*'], 'inactive');
        return view('product.index')->with(compact('aproducts', 'iproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }

        $bdatas = Brand::select('id', 'name')->get();
        $brands = array();
        foreach ($bdatas as $bdata)
        {
            $brands[$bdata->id] = $bdata->name;
        }

        $tdatas = Type::select('id', 'name')->get();
        $types = array();
        foreach ($tdatas as $tdata)
        {
            $types[$tdata->id] = $tdata->name;
        }

        $sdatas = Supplier::select('id', 'name')->get();
        $suppliers = array();
        foreach ($sdatas as $sdata)
        {
            $suppliers[$sdata->id] = $sdata->name;
        }

        return view('product.create')->with(compact('brands', 'types', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //validate data
          $this->validate($request,[
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'price' => 'required||regex:/^\d+(\.\d{1,2})?$/',
            'supplier' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|image|max:2000',

        ]);
        //Handle Product Image Upload
        //Get Image name with extension
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        //Get just Image name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get Image extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //Image name to store
        $imageNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload PSF
        $path = $request->file('image')->storeAs('public/productimages', $imageNameToStore);

        //create product table input
        $product = new Product;
        $product->name = $request->input('name');
        $product->type_id = $request->input('type');
        $product->price = $request->input('price');
        $product->image = $imageNameToStore;
        $product->brand_id = $request->input('brand');
        $product->quantity = $request->input('quantity');
        $product->supplier_id = $request->input('supplier');
        $product->status = 1;
        $product->save();

        return redirect('/product')->with('success', 'Product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $productreviews = Product::find($id)->reviews()->orderBy('created_at','desc')->paginate(10);
        return view('product.show')->with(compact('product', 'productreviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $product = Product::find($id);

        $bdatas = Brand::select('id', 'name')->get();
        $brands = array();
        foreach ($bdatas as $bdata)
        {
            $brands[$bdata->id] = $bdata->name;
        }

        $tdatas = Type::select('id', 'name')->get();
        $types = array();
        foreach ($tdatas as $tdata)
        {
            $types[$tdata->id] = $tdata->name;
        }

        $sdatas = Supplier::select('id', 'name')->get();
        $suppliers = array();
        foreach ($sdatas as $sdata)
        {
            $suppliers[$sdata->id] = $sdata->name;
        }
        return view('product.edit')->with(compact('product', 'brands', 'types', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate data
        $this->validate($request,[
          'name' => 'required',
          'brand' => 'required',
          'type' => 'required',
          'price' => 'required||regex:/^\d+(\.\d{1,2})?$/',
          'supplier' => 'required',
          'quantity' => 'required|numeric',
          'status' => 'required',

      ]);
      $product = Product::find($id);
      //Handle Product Image Upload
        if($request->hasFile('image')){

            //validate data
            $this->validate($request,[
                'image' => 'required|image|max:2000',
            ]);
      
            //Get Image name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just Image name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get Image extension
            $extension = $request->file('image')->getClientOriginalExtension();
            //Image name to store
            $imageNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload PSF
            $path = $request->file('image')->storeAs('public/productimages', $imageNameToStore);
            //Delete previous file
            Storage::delete('public/productimages/'.$product->image);

            }

      //create product table input
      $product->name = $request->input('name');
      $product->type_id = $request->input('type');
      $product->price = $request->input('price');
      if($request->hasFile('image')){
          $product->image = $imageNameToStore;
      }
      $product->brand_id = $request->input('brand');
      $product->quantity = $request->input('quantity');
      $product->supplier_id = $request->input('supplier');
      $product->status = $request->input('status');
      $product->save();

      return redirect('/product/'.$product->id)->with('success', 'Product Updated');
    }

    public function status($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $productupdate = Product::find($id);
        if($productupdate->status == 1){
        $productupdate->status = 2;
        $productupdate->save();
        $success = 'Product Deactivated';
        } 
        else
        {
        $productupdate->status = 1;
        $productupdate->save();
        $success = 'Product Activated';
        }
        return redirect('/product')->with(compact('success'));
    }


    public function stats($id)
    {
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        if($id == 1){
            $sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, COALESCE(sum(order_details.quantity),0) total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->paginate(9);

        }elseif($id == 2){
            $sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, COALESCE(sum(order_details.quantity),0) total')
            ->groupBy('products.id')
            ->orderBy('total','asc')
            ->paginate(9);

        }else{
            return redirect('/products/')->with('error', 'Unauthorised Page');
        }
        return view('product.stats')->with('sales', $sales);


    }

    

    public static function statsproductinfo($id)
    {
        $product = Product::find($id);

        return $product;
    }

    public static function showbrandname($id)
    {
        $brands = Brand::find($id);

        return $brands->name;
    }

    public static function showsuppliername($id)
    {
        $suppliers = Supplier::find($id);

        return $suppliers->name;
    }

}
