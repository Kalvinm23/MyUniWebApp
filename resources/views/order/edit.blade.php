@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Update Order</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['OrderController@update', $order->id], 'method' => 'POST', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('order', 'Order Number:')}}
                                    {{Form::text('order', $order->id, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('datecreated', 'Date Created:')}}
                                    {{Form::date('datecreated', $order->created_at, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('paymentcode', 'Payment Code:')}}
                                    {{Form::text('paymentcode', $order->payment_code, ['class' => 'form-control', 'disabled' => 'disabled'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('status', 'Status:')}}
                                    {{Form::select('status', ['1' => 'Order Made', '2' => 'Processing', '3' => 'Dispatched'], $order->status, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('tracking', 'Hermes Tracking:')}}
                                    {{Form::text('tracking', '', ['class' => 'form-control'])}}
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
    <div class="col-lg-2">
    </div>
</div>  
@endsection
