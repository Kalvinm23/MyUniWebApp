<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetails;
use App\User;
use App\Product;
use Auth;
use Cart;

class OrderController extends Controller
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
    public function index()
    {
        $user_id = auth()->user()->id;
        $orders = User::find($user_id)->orders()->orderBy('created_at','desc')->get();

       return view('order.index')->with('orders', $orders);
    }

    public function orders()
    {
        $orders1 = Order::where('status', '=' , 1)->orderBy('created_at','desc')->paginate(9, ['*'], 'orderplaced');
        $orders2 = Order::where('status', '=' , 2)->orderBy('created_at','desc')->paginate(9, ['*'], 'processing');
        $orders3 = Order::where('status', '=' , 3)->orderBy('created_at','desc')->paginate(9, ['*'], 'dispatched');

        return view('order.allorders')->with(compact('orders1', 'orders2', 'orders3'));
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
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            'contactnumber' => 'required|numeric|min:11',
        ]);
        
        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->total_price = Cart::total();
        $order->payment_code = '013121217S545684J';
        $order->status = 1;
        $order->address = $request->input('address');
        $order->postcode = $request->input('postcode');
        $order->city = $request->input('city');
        $order->contact_number = $request->input('contactnumber');
        $order->save();
        
        foreach (Cart::content() as $cartItem)
        {
            $orderdetails = new OrderDetails;
            $orderdetails->order_id = $order->id;
            $orderdetails->product_id = $cartItem->id;
            $orderdetails->price = $cartItem->price;
            $orderdetails->quantity = $cartItem->qty;
            $orderdetails->save();

            $product = Product::find($cartItem->id);
            $product->decrement('quantity', $cartItem->qty);
            $product->save();
        }

        Cart::destroy();
        return redirect('/ordersuccess');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        // Check for correct user
        if(auth()->user()->permission !== 2 && auth()->user()->id !== $order->user_id){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $products = Order::find($id)->products;
       
        return view('order.show')->with(compact('order', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        $order = Order::find($id);

        return view('order.edit')->with(compact('order'));
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
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }  
      $order = Order::find($id);

        if($request->input('status') == 3){
            //validate data
            $this->validate($request,[
            'tracking' => 'required',
            ]);
            $order->status = $request->input('status');
            $order->tracking_code = $request->input('tracking');
            $order->save();
        }else{
            $order->status = $request->input('status');
            $order->save();
        }
        return redirect('/order/'.$order->id)->with('success', 'Order Updated');
    }

}
