<?php

namespace App\Http\Controllers;

use App\Mail\GeneralContactForm;
use App\Mail\UserContactForm;
use App\Mail\OrderContactForm;
use App\Mail\SupplierOrderForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Order;
use App\SupplierOrder;

class ContactFormController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['generalcontact', 'generalcontactsend']]);
    }

    public function generalcontact()
    {
    return view('contact.generalcontactform');
    }

    public function generalcontactsend(Request $request)
    {
        //validate data
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        //send email
        Mail::to('info@cobainmusicalshop.com')->send(new GeneralContactForm($request));
        
        return redirect('contactus')->with('success', 'Your Message has been Sent.');
    }


    public function usercontact()
    {
        $user_id = auth()->user()->id;      
        $userdetails = User::find($user_id)->userdetails;
        $user = User::find($user_id);

    return view('contact.usercontactform')->with(compact('user', 'userdetails'));
    }

    public function usercontactsend(Request $request)
    {

        //send email
        Mail::to('info@cobainmusicalshop.com')->send(new UserContactForm($request));
        
        return redirect('usercontactus')->with('success', 'Your Message has been Sent.');
    }


    public function ordercontact($id)
    {
        $order = Order::find($id);     
        $userdetails = User::find($order->user_id)->userdetails;
        $user = User::find($order->user_id);

    return view('contact.ordercontactform')->with(compact('user', 'userdetails', 'order'));
    }

    public function ordercontactsend(Request $request)
    {

        //send email
        Mail::to('info@cobainmusicalshop.com')->send(new OrderContactForm($request));
        
        return redirect('order')->with('success', 'Your Message has been Sent.');
    }


    public function supplierordersend($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        //send email
        Mail::to('info@cobainmusicalshop.com')->send(new SupplierOrderForm($id));
        
        $order = SupplierOrder::find($id);
        $order->status = 2;
        $order->save();
        
        return redirect('/supplierorder/'.$order->supplier_id)->with('success', 'Your Order has been Sent.');
    }

}
