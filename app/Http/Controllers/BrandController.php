<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
Use Auth;

class BrandController extends Controller
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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $authpermission = auth()->user()->permission;
        $brands = Brand::paginate(7);

        return view('brand.index')->with('brands', $brands);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        //validate data
        $this->validate($request,[
            'name' => 'required|unique:brands,name',
        ]);
        
        //create brand
        $brand = new Brand;
        $brand->name = $request->input('name');
        $brand->save();

        return redirect('/brand')->with('success', 'Brand Created');

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
        $products = Brand::find($id)->products()->paginate(9);

        return view('brand.show')->with('products', $products);
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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $brand = Brand::find($id);

        return view('brand.edit')->with('brand', $brand);
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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorised Page');
        }
        $brand = Brand::find($id);
        //validate data
        $this->validate($request,[
            'name' => 'required|unique:brands,name,'.$brand->id,
        ]);
        
        //create brand
        $brand->name = $request->input('name');
        $brand->save();

        return redirect('/brand')->with('success', 'Brand Updated');
    }
    
}
