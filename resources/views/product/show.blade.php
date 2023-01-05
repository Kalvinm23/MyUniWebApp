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
                    @if (Auth::check())    
                    @if (Auth::user()->permission == 2)                   
                    <h4>Supplier: <?php echo \App\Http\Controllers\ProductController::showsuppliername($product->supplier_id);?>
                    </h4>
                    <h4>Price: £{{$product->price}}</h4>
                    <h4>Quantity: {{$product->quantity}}</h4>
                    <h4>
                        Status: @if($product->status == 1)
                        Active
                        @else
                        Inactive
                        @endif
                    </h4>
                    @else
                    <h4>Price: £{{$product->price}}</h4>
                    <h4>Quantity: {{$product->quantity}}</h4>
                    @endif
                    @endif
                </div>
                <div class="card-footer">
                    @if (Auth::check())
                    @if (Auth::user()->permission == 2)         
                    <a type ="button" class="btn btn-success" href="{{$product->id}}/edit">Update</a>
                    @else 
                    <a href="{{ route('add', [ $product->getRouteKey() ]) }}" type="button" class="btn btn-success btn">Add to Cart</a>
                    @endif
                    @else 
                    <a href="{{ route('add', [ $product->getRouteKey() ]) }}" type="button" class="btn btn-success btn">Add to Cart</a>
                    @endif
                </div>
            </div>
      
            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Product Reviews
                </div>
                <div class="card-body">
                    @if(count($productreviews) > 0)
                        @foreach($productreviews as $productreview)
                        <p>{{$productreview->review}}</p>
                        <small class="text-muted">Posted by <?php 
                            echo \App\Http\Controllers\UserDetailsController::usersname($productreview->user_id);?>  on {{ \Carbon\Carbon::parse($productreview->created_at)->format('d/m/Y')}}</small>
                        <hr>
                        @endforeach
                    @else 
                    <p>No Reviews Submitted</p>
                    @endif
                        @if (Auth::check())
                            <a href='/productreview/create/{{$product->id}}' class="btn btn-success">Leave a Review</a>
                        @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection