@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="/storage/productimages/{{$product->image}}" alt="">
                <div class="card-body">
                    <h3 class="card-title">{{$product->name}}</h3>
                    <h4><?php echo \App\Http\Controllers\ProductController::showbrandname($product->brand_id);?></h4> 
                    {!! Form::open(['action' => ['ProductReviewController@store', $product->id], 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group">
                        {{Form::label('review', 'Review')}}
                        {{Form::textarea('review', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Your Review'])}}
                    </div>  
                        {{Form::submit('Add Review', ['class' => 'btn btn-primary btn-lg'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection