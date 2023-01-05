@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Add Product</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'files' => true, 'autocomplete'=> 'off']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('name', 'Product Name')}}
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('brand', 'Brand')}}
                                    {{Form::select('brand', $brands, null, ['class' => 'form-control', 'placeholder' => 'Enter Brand'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('type', 'Type')}}
                                    {{Form::select('type', $types, null, ['class' => 'form-control', 'placeholder' => 'Enter Type'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('price', 'Price £')}}
                                    {{Form::number('price', '', ['class' => 'form-control' ,'step' => '.01', 'placeholder' => 'Enter Price'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('supplier', 'Supplier')}}
                                    {{Form::select('supplier', $suppliers, null, ['class' => 'form-control', 'placeholder' => 'Enter Supplier'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('quantity', 'Quantity')}}
                                    {{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' => 'Enter Quantity'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('image', 'Attach Image')}}
                                    {{Form::file('image', ['class' => 'form-control-file'])}}
                                </div>        
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{Form::submit('Add Product', ['class' => 'btn btn-primary btn-lg'])}}
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
