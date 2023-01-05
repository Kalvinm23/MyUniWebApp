@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">               
            @if(count($products) > 0)
            <div class="row">
                @foreach($products as $product)
                @if($product->quantity > 0)
                @if($product->status == 1)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="img-fluid" src="/storage/productimages/{{$product->image}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title"><a href="/product/{{$product->id}}">{{$product->name}}</a></h4>
                            <h5>
                            <?php echo \App\Http\Controllers\ProductController::showbrandname($product->brand_id);?>
                            </h5>
                            <h5>£{{$product->price}}</h5>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('add', [ $product->getRouteKey() ]) }}" type="button" class="btn btn-success btn">Add to Cart</a>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                @endforeach 
            </div>
                {{ $products->links() }}                   
                @else
                <h3>No Products Currently Available</h3>
            @endif
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection