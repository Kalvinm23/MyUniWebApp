@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title p-3">
                        <div class="row pt-3">
                            <div class="col-sm-8">
                                <h4>Order <strong>#{{$order->id}}</strong> <br>Created at: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</h4>
                            </div>
                            <div class="col-sm-4 text-right">
                                <a  class="btn btn-primary btn-lg btn-block" href="/supplierorder/{{$supplier->id}}">
                                    <i class="fas fa-share"></i> Return to Orders
                                </a>
                            </div>
                            <div class="col-sm-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Auth::user()->permission == 2)     
                    <div class="row">
                        <div class="col-lg-12">  
                            @if($order->status == 1)
                                <a href="/supplierordersend/{{$order->id}}" type="button" class="btn btn-primary btn mb-3 float-right">Send Order</a>
                            @elseif($order->status == 2)  
                                <a href="/supplierorder/{{$order->id}}/update" type="button" class="btn btn-primary btn mb-3 float-right">Order Received</a>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Full Name:</label> 
                                <input id="name" name="name" value="{{$supplier->name}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Status:</label> 
                                <input id="name" name="name" value="@if($order->status == 1) Order Created @elseif($order->status == 2) Order Sent @elseif($order->status == 3) Complete @else N/A @endif" class="form-control here" type="text" disabled>
                            </div>
                            @if($order->status == 2)
                                <div class="form-group row">
                                    <label for="dispatchdate" class="col-form-label">Emailed Date:</label> 
                                    <input id="dispatchdate" name="dispatchdate" value="{{\Carbon\Carbon::parse($order->updated_at)->format('d/m/Y')}}" class="form-control here" type="text" disabled>
                                </div>
                            @elseif($order->status == 3)
                                <div class="form-group row">
                                    <label for="dispatchdate" class="col-form-label">Completed Date:</label> 
                                    <input id="dispatchdate" name="dispatchdate" value="{{\Carbon\Carbon::parse($order->updated_at)->format('d/m/Y')}}" class="form-control here" type="text" disabled>
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach($products as $product)
                    <div class="row">
                        <div class="col-sm-2"><img class="card-img-top" src="/storage/productimages/<?php echo \App\Http\Controllers\StoreController::showimage($product->product_id);?>">
                        </div>
                        <div class="col-sm-7">
                            <h4 class="product-name"><?php echo \App\Http\Controllers\StoreController::showproductname($product->product_id);?></h4>
                            <h4><small>Brand: <?php echo \App\Http\Controllers\StoreController::showbrandname($product->product_id);?></small></h4>
                        </div>
                        <div class="col-sm-3">
                            <h5>Quantity: {{ $product->quantity }}</h5>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>    
@endsection

