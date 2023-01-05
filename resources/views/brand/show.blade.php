@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">        
            @if(count($products) > 0)
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="img-fluid" src="/storage/productimages/{{$product->image}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <h5>
                            <?php echo \App\Http\Controllers\ProductController::showbrandname($product->brand_id);?>
                            </h5>
                            <h5>Supplier: 
                            <?php echo \App\Http\Controllers\ProductController::showsuppliername($product->supplier_id);?>
                            </h5>
                            <h5>£{{$product->price}}</h5>
                            <h5>Quantity: {{$product->quantity}}</h5>
                            <h5>
                                Status: @if($product->status == 1)
                                Active
                                @else
                                Inactive
                                @endif
                            </h5>
                        </div>
                        <div class="card-footer">
                            <a type ="button" class="btn btn-success" href="/product/{{$product->id}}">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach 
            </div>
            {{ $products->links() }}  
            @else
                <h3>No Products Currently Available For This Brand</h3>
            @endif
        </div>     
        <div class="col-lg-2">
        </div>       
    </div>
@endsection