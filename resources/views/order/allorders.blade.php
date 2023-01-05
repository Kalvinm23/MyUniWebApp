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
                    <ul class="nav nav-pills nav-fill mb-3">
                        <li class="nav-item">
                            <a href="#ordermade" class="nav-link active" data-toggle="tab">Order Made</a>
                        </li>
                        <li class="nav-item">
                            <a href="#processing" class="nav-link" data-toggle="tab">Processing</a>
                        </li>
                        <li class="nav-item">
                            <a href="#dispatched" class="nav-link" data-toggle="tab">Dispatched</a>
                        </li>
                    </ul>     
                    <div class="tab-content ">
                        <div class="tab-pane fade show active" id="ordermade">
                            @if(count($orders1) > 0)
                            @foreach($orders1 as $order1)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-right">
                                            <label class="badge badge-danger p-2"><h6 class="mb-0">
                                                @if($order1->status == 1)
                                                    Order Placed
                                                @elseif($order1->status == 2)
                                                    Processing
                                                @elseif($order1->status == 3)
                                                    Dispatched
                                                @else
                                                    N/A
                                                @endif
                                            </h6></label> 
                                        </div>
                                        <h4>Order Number <span class="badge badge-success text-white p-2">#{{$order1->id}}</span></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Total Price: £{{$order1->total_price}}</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Date of Order: {{ \Carbon\Carbon::parse($order1->created_at)->format('d/m/Y')}} </h4> 
                                    </div>
                                    <div class="col-sm-12">
                                        <a type ="button" class="btn btn-primary" href="order/{{$order1->id}}">View Order</a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            {{ $orders1->links() }}  
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>No Orders Made</h3>
                                    </div>
                                </div>
                            @endif    
                        </div>
                        <div class="tab-pane fade" id="processing">
                            @if(count($orders2) > 0)
                            @foreach($orders2 as $order2)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-right">
                                            <label class="badge badge-danger p-2"><h6 class="mb-0">
                                                @if($order2->status == 1)
                                                    Order Placed
                                                @elseif($order2->status == 2)
                                                    Processing
                                                @elseif($order2->status == 3)
                                                    Dispatched
                                                @else
                                                    N/A
                                                @endif
                                            </h6></label> 
                                        </div>
                                        <h4>Order Number <span class="badge badge-success text-white p-2">#{{$order2->id}}</span></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Total Price: £{{$order2->total_price}}</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Date of Order: {{ \Carbon\Carbon::parse($order2->created_at)->format('d/m/Y')}} </h4> 
                                    </div>
                                    <div class="col-sm-12">
                                        <a type ="button" class="btn btn-primary" href="order/{{$order2->id}}">View Order</a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            {{ $orders2->links() }}  
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>No Orders Being Processed</h3>
                                    </div>
                                </div>
                            @endif    
                        </div>
                        <div class="tab-pane fade" id="dispatched">
                            @if(count($orders3) > 0)
                            @foreach($orders3 as $order3)
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="float-right">
                                            <label class="badge badge-danger p-2"><h6 class="mb-0">
                                                @if($order3->status == 1)
                                                    Order Placed
                                                @elseif($order3->status == 2)
                                                    Processing
                                                @elseif($order3->status == 3)
                                                    Dispatched
                                                @else
                                                    N/A
                                                @endif
                                            </h6></label> 
                                        </div>
                                        <h4>Order Number <span class="badge badge-success text-white p-2">#{{$order3->id}}</span></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Total Price: £{{$order3->total_price}}</h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <h4>Date of Order: {{ \Carbon\Carbon::parse($order3->created_at)->format('d/m/Y')}} </h4> 
                                    </div>
                                    <div class="col-sm-12">
                                        <a type ="button" class="btn btn-primary" href="order/{{$order3->id}}">View Order</a>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                            {{ $orders3->links() }}  
                            @else
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>No Orders Dispatched</h3>
                                    </div>
                                </div>
                            @endif    
                        </div>
                    </div>                
                </div>
            </div>
            <div class="col-lg-2">
            </div>
        </div> 
    </div>
@endsection

