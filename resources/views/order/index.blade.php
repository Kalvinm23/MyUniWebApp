@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-default card-order">
                <div class="card-heading p-3">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Order History</h2>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($orders) > 0)
                    @foreach($orders as $order)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="float-right">
                                    <label class="badge badge-danger p-2"><h6 class="mb-0">
                                        @if($order->status == 1)
                                            Order Placed
                                        @elseif($order->status == 2)
                                            Processing
                                        @elseif($order->status == 3)
                                            Dispatched
                                        @else
                                            N/A
                                        @endif
                                    </h6></label> 
                                </div>
                                <h4>Order Number <span class="badge badge-success text-white p-2">#{{$order->id}}</span></h4>
                            </div>
                            <div class="col-sm-12">
                                <h4>Total Price: £{{$order->total_price}}</h4>
                            </div>
                            <div class="col-sm-12">
                                <h4>Date of Order: {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}} </h4> 
                            </div>
                            <div class="col-sm-12">
                                <a type ="button" class="btn btn-primary" href="order/{{$order->id}}">View Order</a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    @else
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>No Orders</h3>
                            </div>
                        </div>
                    @endif                    
                </div>
            </div>
            <div class="col-lg-2">
            </div>
        </div> 
    </div>
@endsection

