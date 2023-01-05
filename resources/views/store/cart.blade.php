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
                                <h3><i class="fas fa-shopping-cart"></i> Shopping Cart</h3>
                            </div>
                            <div class="col-sm-4 text-right">
                                <a type ="button" class="btn btn-primary btn-lg btn-block" href="store/1"><i class="fas fa-share"></i> Continue shopping</a>
                            </div>
                            <div class="col-sm-2">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach(Cart::content() as $cartItem)
                    <div class="row">
                        <div class="col-sm-2"><img class="card-img-top" src="/storage/productimages/<?php echo \App\Http\Controllers\StoreController::showimage($cartItem->id);?>">
                        </div>
                        <div class="col-sm-4">
                            <h4 class="product-name">{{$cartItem->name}}</h4><h4><small>Brand: <?php echo \App\Http\Controllers\StoreController::showbrandname($cartItem->id);?></small></h4>
                        </div>
                        <div class="col-sm-2">
                            <h5>Price: £{{ $cartItem->price }}</h5>
                        </div>
                        <div class="col-sm-2">
                            <h5>Quantity: {{ $cartItem->qty }}</h5>
                        </div>
                        <div class="col-sm-2 text-center p-1">
                            <a href="{{ route('remove', [ $cartItem->rowId ]) }}" type="button" class="btn btn-danger btn-lg"  onclick="return confirm('Are you sure you want to remove {{$cartItem->name}}?')"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    {!! Form::open(['action' => 'OrderController@store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('address', 'Delivery Address')}}
                                {{Form::text('address', $userdetails->address, ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('postcode', 'Delivery Postcode')}}
                                {{Form::text('postcode', $userdetails->postcode, ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('city', 'Delivery City')}}
                                {{Form::text('city', $userdetails->city, ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{Form::label('contactnumber', 'Contact Number')}}
                                {{Form::number('contactnumber',  $userdetails->contact_number, ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-lg-3">
                            <h4 class="text-right">Subtotal: £<?php echo Cart::subtotal();; ?></h4>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="text-right">Tax: £<?php echo Cart::tax();; ?></h4>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="text-right">Total: £<?php echo Cart::total(); ?></h4>
                        </div>
                        <div class="col-lg-3 text-right">
                            {{Form::submit('Pay', ['class' => 'btn btn-success btn-lg'])}}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>    
@endsection

