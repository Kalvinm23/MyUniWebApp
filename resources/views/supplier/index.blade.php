@extends('layouts.app')
@section('content')
    <div class="row">   
        <div class="col-lg-2">
        </div> 
        <div class="col-lg-8">  
        <a href="/supplier/create" type="button" class="btn btn-success btn mb-3 float-right">Add New Supplier</a>  
        </div>
        <div class="col-lg-2">
        </div>
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">     
            <ul class="nav nav-pills nav-fill mb-1">
                <li class="nav-item">
                    <a href="#active" class="nav-link active" data-toggle="tab">Active</a>
                </li>
                <li class="nav-item">
                    <a href="#inactive" class="nav-link" data-toggle="tab">Inactive</a>
                </li>
            </ul>     
            <div class="tab-content ">
                <div class="tab-pane fade show active" id="active">               
                @if(count($asuppliers) > 0)
                <div class="row">
                    @foreach($asuppliers as $asupplier)
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">{{$asupplier->name}}</h4>
                                <h5>Email: {{$asupplier->email}}</h5>
                                <h5>Contact Number: {{$asupplier->contact_number}}</h5>
                                <h5>Account Number: {{$asupplier->account_number}}</h5>
                            </div>
                            <div class="card-footer">
                                <a type ="button" class="btn btn-success" href="supplier/{{$asupplier->id}}">View Supplier</a>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
                {{ $asuppliers->links() }}  
                    @else
                    <h3>No Active Suppliers</h3>
                @endif
                </div>
                <div class="tab-pane fade" id="inactive">             
                @if(count($isuppliers) > 0)
                <div class="row">
                    @foreach($isuppliers as $isupplier)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">{{$isupplier->name}}</h4>
                                <h5>Email: {{$isupplier->email}}</h5>
                                <h5>Contact Number: {{$isupplier->contact_number}}</h5>
                                <h5>Account Number: {{$isupplier->account_number}}</h5>
                            </div>
                            <div class="card-footer">
                                <a type ="button" class="btn btn-success btn-sm" href="supplier/{{$isupplier->id}}">View Supplier</a>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                </div>
                {{ $isuppliers->links() }}  
                    @else
                    <h3>No Inactive Suppliers</h3>
                @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection