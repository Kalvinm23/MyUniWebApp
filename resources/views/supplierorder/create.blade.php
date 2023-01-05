@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-default card-order">
                <div class="card-heading p-3">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Order Stock</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['SupplierOrderController@store', $supplier->id], 'method' => 'POST', 'files' => true]) !!}
                    @foreach($products as $product)
                    <div class="row">
                        <div class="col-sm-2"><img class="card-img-top" src="/storage/productimages/<?php echo \App\Http\Controllers\StoreController::showimage($product->id);?>">
                        </div>
                        <div class="col-sm-4">
                            <h4 class="product-name">{{$product->name}}</h4><h4><small>Brand: <?php echo \App\Http\Controllers\StoreController::showbrandname($product->id);?></small></h4>
                        </div>
                        <div class="col-sm-2">
                            <h5>Price: £{{ $product->price }}</h5>
                        </div>
                        <div class="col-sm-2">
                            <h5>Quantity: {{ $product->quantity }}</h5>
                        </div>
                        <div class="col-sm-2 p-1">
                            <div class="form-group">
                                {{Form::hidden('product_id[]', $product->id, array('id' => 'product_id[]'))}}
                                {{Form::number('quantity[]', '5', ['min'=>5,'max'=>50, 'class' => 'form-control', 'placeholder' => 'Enter quantity'])}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach                    
                    {{Form::submit('Make Order', ['class' => 'btn btn-primary btn-lg'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-lg-2">
            </div>
        </div> 
    </div>
@endsection

