@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            @if(count($sales) > 0)
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <tbody>
                            @foreach($sales as $sale)
                            <?php $product = \App\Http\Controllers\ProductController::statsproductinfo($sale->id);?>
                            <tr>
                                <td><a href="/product/{{$product->id}}">{{$product->name}}</a></td>
                                <td><?php echo \App\Http\Controllers\ProductController::showbrandname($product->brand_id);?></td>
                                <td>£{{$product->price}}</td>
                                <td>{{$product->quantity}} Stock</td>
                                <td>{{$sale->total}} Sold</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>     
                </div>       
                {{ $sales->links() }}
            @endif     
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection