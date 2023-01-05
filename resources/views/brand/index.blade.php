@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Brands</h2>
                    </div>
                </div>
                <div class="card-body">
                    <a href="/brand/create" type="button" class="btn btn-success btn mb-3 float-right">Add New Brand</a>
                    @if(count($brands) > 0)
                        <table class="table table-striped border">
                            @foreach($brands as $brand)
                                <tr>
                                    <td><h5>{{$brand->name}}</h5></td>
                                    <td><a href="/brand/{{$brand->id}}/edit" type="button" class="bbtn btn-success btn">Edit</a></td>
                                    <td><a href="/brand/{{$brand->id}}" type="button" class="btn btn-success btn">Products</a></td>
                                </tr>
                            @endforeach
                        </table>  
                        {{ $brands->links() }}  
                    @else
                        <p>No Brands Available</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>  
@endsection
