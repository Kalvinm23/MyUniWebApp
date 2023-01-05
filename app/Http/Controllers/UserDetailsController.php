<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDetails;
use App\User;

class UserDetailsController extends Controller
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
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        return view('userdetails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userdetails = User::find($id)->userdetails;
        $user = User::find($id);
        
        // Check for correct user
        if(auth()->user()->permission !== 2 && auth()->user()->id !== $user->id){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        return view('userdetails.show')->with(compact('user', 'userdetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userdetails = UserDetails::find($id);
        // Check for correct user
        if(auth()->user()->permission !== 2 && auth()->user()->id !== $userdetails->user_id){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        return view('userdetails.edit')->with('userdetails', $userdetails);
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
        $userdetails = UserDetails::find($id);
        // Check for correct user
        if(auth()->user()->permission !== 2 && auth()->user()->id !== $userdetails->user_id){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }

        //validate data
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'contactnumber' => 'required|numeric|min:11',
            'address' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            ]);
      
            //Update userdetails
            $userdetails->first_name = $request->input('firstname');
            $userdetails->last_name = $request->input('lastname');
            $userdetails->address = $request->input('address');
            $userdetails->postcode = $request->input('postcode');
            $userdetails->city = $request->input('city');
            $userdetails->contact_number = $request->input('contactnumber');
            $userdetails->save();
            return redirect('/userdetails/'.$userdetails->user_id)->with('success', 'Profile Updated');
    }

    public function status($id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        $userupdate = user::find($id);
        if($userupdate->status == 1){
        $userupdate->status = 2;
        $userupdate->save();
        $success = 'Account Suspended';
        } 
        else
        {
        $userupdate->status = 1;
        $userupdate->save();
        $success = 'Account Reinstated';
        }
        $userdetails = User::find($id)->userdetails;
        $user = User::find($id);
        return redirect('/userdetails/'.$id)->with(compact('success', 'user', 'userdetails'));
    }

    public function search(Request $request, $id)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        if($id == 1){
            $user = User::find($request->input('userid'));
            if($user != null){
                return redirect('userdetails/'.$user->id);
            }else{
                return redirect('userdetails')->with('error', 'No User found with ID of: '.$request->input('userid'));
            }
        }elseif($id == 2){
            $user = User::where('email', $request->input('email'))->get()->first();
            if($user != null){
                return redirect('userdetails/'.$user->id);
            }else{
                return redirect('userdetails')->with('error', 'No User found with email of: '.$request->input('email'));
            }
        }elseif($id == 3){
            $names = explode(" ", $request->input('name'));
            $users = UserDetails::where('first_name', $names)->orWhere('last_name', $names)->get();
            $count = UserDetails::where('first_name', $names)->orWhere('last_name', $names)->count();
            if($count > 0){
                return view('userdetails.search')->with('users', $users);
            }else{
                return redirect('userdetails')->with('error', 'No User found with name of: '.$request->input('name'));
            }
        }else{
            return redirect('userdetails')->with('error', 'Error');
        }
    }

    public static function usersname($id)
    {
        $userdetails = User::find($id)->userdetails;
        $fullname = $userdetails->first_name.' '.$userdetails->last_name;
        return $fullname;  
    }

    public static function showemail($id)
    {
        $user = User::find($id);
        return $user->email;
    }
    
}
