@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Update Supplier</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['SupplierController@update', $supplier->id], 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('name', 'Supplier Name')}}
                                    {{Form::text('name', $supplier->name, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('email', 'Email Address')}}
                                    {{Form::email('email',  $supplier->email, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('contactnumber', 'Contact Number')}}
                                    {{Form::number('contactnumber',  $supplier->contact_number, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('accountnumber', 'Account Number')}}
                                    {{Form::number('accountnumber',  $supplier->account_number, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('expirydate', 'Expiry Date')}}
                                    {{Form::date('expirydate',  $supplier->expiry_date, ['class' => 'form-control'])}}
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('status', 'Status')}}
                                    {{Form::select('status', ['1' => 'Active', '2' => 'Inactive'], $supplier->status, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary btn-lg'])}}
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
