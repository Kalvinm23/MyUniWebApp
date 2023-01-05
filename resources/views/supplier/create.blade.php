@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Add Supplier</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'SupplierController@store', 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('name', 'Supplier Name')}}
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Supplier Name'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('email', 'Email Address')}}
                                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email Address'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('contactnumber', 'Contact Number')}}
                                    {{Form::number('contactnumber', '', ['class' => 'form-control', 'placeholder' => 'Enter Contact Number'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('accountnumber', 'Account Number')}}
                                    {{Form::number('accountnumber', '', ['class' => 'form-control', 'placeholder' => 'Enter Account Number'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('expirydate', 'Expiry Date')}}
                                    {{Form::date('expirydate', '', ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('contract', 'Attach Contact')}}
                                    {{Form::file('contract', ['class' => 'form-control-file'])}}
                                </div>        
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{Form::submit('Add Supplier', ['class' => 'btn btn-primary btn-lg'])}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
    </div>
    </div>  
@endsection
