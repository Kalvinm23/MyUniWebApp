@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Supplier Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Order Stock</label> 
                                <div class="col-8">
                                    <a type ="button" class="btn btn-primary" href="/supplierorder/{{$supplier->id}}">Order Stock</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Supplier Name</label> 
                                <div class="col-8">
                                    <input id="name" name="name" class="form-control here" type="text" value="{{$supplier->name}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                    <input id="email" name="email" value="{{$supplier->email}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contactnumber" class="col-4 col-form-label">Contact Number</label> 
                                <div class="col-8">
                                    <input id="contactnumber" name="contactnumber" value="{{$supplier->contact_number}}" class="form-control here" required="required" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="accountnumber" class="col-4 col-form-label">Account Number</label> 
                                <div class="col-8">
                                    <input id="accountnumber" name="accountnumber" value="{{$supplier->account_number}}" class="form-control here" required="required" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-4 col-form-label">Status</label> 
                                <div class="col-8">
                                <input id="status" name="status" value="@if($supplier->status == 1) Active @else Inactive @endif" class="form-control here" required="required" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="expirydate" class="col-4 col-form-label">Expiry Date</label> 
                                <div class="col-8">
                                    <input id="expirydate" name="expirydate" class="form-control here" required="required" type="date" value="{{$supplier->expiry_date}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">View Contract</label> 
                                <div class="col-8">
                                    <a type ="button" class="btn btn-primary" href="{{ asset('storage/suppliercontracts/'.$supplier->contract) }}"  target="_blank">View Contract</a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <a type ="button" class="btn btn-primary" href="{{$supplier->id}}/edit">Update Supplier Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection

