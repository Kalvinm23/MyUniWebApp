@extends('layouts.app')
@section('content')
    <div class="row">   
        <div class="col-lg-2">
        </div>     
        <div class="col-lg-8"> 
                <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Product Stats
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="/productstats/1">Most Sold Products</a>
                    <a class="dropdown-item" href="/productstats/2">Least Sold Products</a>
                </div>
            <a href="/product/create" type="button" class="btn btn-success btn mb-3 float-right">Add New Product</a>  
        </div>
        <div class="col-lg-2">
        </div>
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">  
            <ul class="nav nav-pills nav-fill mb-1">
                <li class="nav-item">
                    <a href="#active" class="nav-link active" data-toggle="tab">Active</a>
                </li>
                <li class="nav-item">
                    <a href="#inactive" class="nav-link" data-toggle="tab">Inactive</a>
                </li>
            </ul>     
            <div class="tab-content ">
                <div class="tab-pane fade show active" id="active">
                    @if(count($aproducts) > 0)
                    <div class="row">
                        @foreach($aproducts as $aproduct)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="img-fluid" src="/storage/productimages/{{$aproduct->image}}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">{{$aproduct->name}}</h4>
                                    <h5>
                                    <?php echo \App\Http\Controllers\ProductController::showbrandname($aproduct->brand_id);?>
                                    </h5>
                                    <h5>Supplier: 
                                    <?php echo \App\Http\Controllers\ProductController::showsuppliername($aproduct->supplier_id);?>
                                    </h5>
                                    <h5>£{{$aproduct->price}}</h5>
                                    <h5>Quantity: {{$aproduct->quantity}}</h5>
                                </div>
                                <div class="card-footer">
                                    <a type ="button" class="btn btn-success btn-sm" href="product/{{$aproduct->id}}">View Product</a>
                                    @if($aproduct->status == 1)
                                    <a type ="button" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure you want to deactivate {{$aproduct->name}}?')" href="product/status/{{$aproduct->id}}">Deactivate Product</a>
                                    @else
                                    <a type ="button" class="btn btn-success btn-sm float-right" onclick="return confirm('Are you sure you want to activate {{$aproduct->name}}?')" href="product/status/{{$aproduct->id}}">Activate Product</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    {{ $aproducts->links() }}  
                    @else
                        <h3>No Products Currently Available</h3>
                    @endif
                </div>
                <div class="tab-pane fade" id="inactive">
                    @if(count($iproducts) > 0)
                    <div class="row">
                        @foreach($iproducts as $iproduct)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="img-fluid" src="/storage/productimages/{{$iproduct->image}}" alt=""></a>
                                <div class="card-body">
                                    <h4 class="card-title">{{$iproduct->name}}</h4>
                                    <h5>
                                    <?php echo \App\Http\Controllers\ProductController::showbrandname($iproduct->brand_id);?>
                                    </h5>
                                    <h5>Supplier: 
                                    <?php echo \App\Http\Controllers\ProductController::showsuppliername($iproduct->supplier_id);?>
                                    </h5>
                                    <h5>£{{$iproduct->price}}</h5>
                                    <h5>Quantity: {{$iproduct->quantity}}</h5>
                                </div>
                                <div class="card-footer">
                                    <a type ="button" class="btn btn-success btn-sm" href="/product/{{$iproduct->id}}">View Product</a>
                                    @if($iproduct->status == 1)
                                    <a type ="button" class="btn btn-danger btn-sm float-right" onclick="return confirm('Are you sure you want to deactivate {{$iproduct->name}}?')" href="product/status/{{$iproduct->id}}">Deactivate Product</a>
                                    @else
                                    <a type ="button" class="btn btn-success btn-sm float-right" onclick="return confirm('Are you sure you want to activate {{$iproduct->name}}?')" href="product/status/{{$iproduct->id}}">Activate Product</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach 
                    </div>
                    {{ $iproducts->links() }}  
                    @else
                        <h3>No Products Currently Available</h3>
                    @endif
                </div>
            </div>            
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection