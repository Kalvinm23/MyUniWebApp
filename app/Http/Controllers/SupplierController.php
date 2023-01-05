<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Supplier;

class SupplierController extends Controller
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
        $asuppliers = Supplier::where('status', '=' , 1)->paginate(9, ['*'], 'active');
        $isuppliers = Supplier::where('status', '!=' , 1)->paginate(9, ['*'], 'inactive');
        return view('supplier.index')->with(compact('asuppliers', 'isuppliers'));
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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        return view('supplier.create');
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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        //validate data
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:suppliers,email',
            'contactnumber' => 'required|numeric|min:11',
            'accountnumber' => 'required',
            'expirydate' => 'required',
            'contract' => 'required|mimes:pdf|max:10000',

        ]);
        //Handle Contract PDF Upload
        //Get PDF name with extension
        $filenameWithExt = $request->file('contract')->getClientOriginalName();
        //Get just PDF name
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get PDF extension
        $extension = $request->file('contract')->getClientOriginalExtension();
        //PDF name to store
        $pdfNameToStore = $filename.'_'.time().'.'.$extension;
        //Upload PSF
        $path = $request->file('contract')->storeAs('public/suppliercontracts', $pdfNameToStore);


        //create supplier
        $supplier = new Supplier;
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->contact_number = $request->input('contactnumber');
        $supplier->account_number = $request->input('accountnumber');
        $supplier->expiry_date = $request->input('expirydate');
        $supplier->contract = $pdfNameToStore;
        $supplier->status = 1;
        $supplier->save();

        return redirect('/supplier')->with('success', 'Supplier Created');

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
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }
        $supplier = Supplier::find($id);
        return view('supplier.show')->with('supplier', $supplier);
    }

    public function showpdf($id)
    {     
        // Check for correct user
        if(auth()->user()->permission !== 2){
            return redirect('/userdetails/'.auth()->user()->id)->with('error', 'Unauthorized Page');
        }   
        $supplier = Supplier::find($id);

        $headers = array(
            'Content-Type: application/pdf',
          );
        return Response::download('storage/suppliercontracts/'.$supplier->contract, $supplier->name.' contract', $headers);
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
        $supplier = Supplier::find($id);
        return view('supplier.edit')->with('supplier', $supplier);
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
        $supplier = Supplier::find($id);

        //validate data
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:suppliers,email,'.$supplier->id,
            'contactnumber' => 'required|numeric|min:11',
            'accountnumber' => 'required',
            'expirydate' => 'required',
            'status' => 'required',
      ]);
      //Handle PDF Image Upload
        if($request->hasFile('contract')){

            //validate data
            $this->validate($request,[
                'contract' => 'required|mimes:pdf|max:10000',
            ]);
      
            //Get PDF name with extension
            $filenameWithExt = $request->file('contract')->getClientOriginalName();
            //Get just PDF name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get PDF extension
            $extension = $request->file('contract')->getClientOriginalExtension();
            //PDF name to store
            $pdfNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload PDF
            $path = $request->file('contract')->storeAs('public/suppliercontracts', $pdfNameToStore);
            //Delete previous file
            Storage::delete('public/suppliercontracts/'.$supplier->contract);

            }
            //Update supplier
            $supplier->name = $request->input('name');
            $supplier->email = $request->input('email');
            $supplier->contact_number = $request->input('contactnumber');
            $supplier->account_number = $request->input('accountnumber');
            $supplier->expiry_date = $request->input('expirydate');
            if($request->hasFile('contract')){
                $supplier->contract = $pdfNameToStore;
            }
            $supplier->status = $request->input('status');
            $supplier->save();
      return redirect('/supplier/'.$supplier->id)->with('success', 'Supplier Updated');
    }

}
