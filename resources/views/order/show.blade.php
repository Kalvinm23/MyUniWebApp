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
                                <a  class="btn btn-primary btn-lg btn-block" href="/order/">
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
                        <a href="/order/{{$order->id}}/edit" type="button" class="btn btn-primary btn mb-3 float-right">Update Order</a>  
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Full Name:</label> 
                                <input id="name" name="name" value="<?php
                                echo \App\Http\Controllers\UserDetailsController::usersname($order->user_id);?>" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Delivery Address:</label> 
                                <input id="name" name="name" value="{{$order->address}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Delivery Postcode:</label> 
                                <input id="name" name="name" value="{{$order->postcode}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Delivery City:</label> 
                                <input id="name" name="name" value="{{$order->city}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Contact Number:</label> 
                                <input id="name" name="name" value="{{$order->contact_number}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Payment Code:</label> 
                                <input id="name" name="name" value="{{$order->payment_code}}" class="form-control here" type="text" disabled>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-form-label">Status:</label> 
                                <input id="name" name="name" value="@if($order->status == 1) Order Placed @elseif($order->status == 2) Processing @elseif($order->status == 3) Dispatched @else N/A @endif" class="form-control here" type="text" disabled>
                            </div>
                            @if($order->status == 3)
                                <div class="form-group row">
                                    <label for="tracking" class="col-form-label">Hermes Tracking Code:</label> 
                                    <input id="tracking" name="tracking" value="{{$order->tracking_code}}" class="form-control here" type="text" disabled>
                                </div>
                                <div class="form-group row">
                                    <label for="dispatchdate" class="col-form-label">Dispatched Date:</label> 
                                    <input id="dispatchdate" name="dispatchdate" value="{{\Carbon\Carbon::parse($order->updated_at)->format('d/m/Y')}}" class="form-control here" type="text" disabled>
                                </div>
                            @endif
                        </div>
                    </div>
                    @foreach($products as $product)
                    <div class="row">
                        <div class="col-sm-2"><img class="card-img-top" src="/storage/productimages/<?php echo \App\Http\Controllers\StoreController::showimage($product->product_id);?>">
                        </div>
                        <div class="col-sm-5">
                            <a href="/product/{{$product->id}}">
                                <h4 class="product-name"><?php echo \App\Http\Controllers\StoreController::showproductname($product->product_id);?></h4>
                            </a>
                            <h4><small>Brand: <?php echo \App\Http\Controllers\StoreController::showbrandname($product->product_id);?></small></h4>
                        </div>
                        <div class="col-sm-3">
                            <h5>Price: £{{ $product->price }}</h5>
                        </div>
                        <div class="col-sm-2">
                            <h5>Quantity: {{ $product->quantity }}</h5>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-lg-9">
                            <h4 class="text-right">Total <strong>{{$order->total_price}}</strong></h4>
                        </div>
                        <div class="col-lg-3 text-right">
                            <a href="/ordercontactus/{{$order->id}}" type="button" class="btn btn-danger btn-lg">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>    
@endsection

