@extends('layouts.app')
@section('content')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-4">
            @foreach($products as $product)
                <div class="col mb-3">
                    <a class="card vh-40" href="{{route('product.show', $product)}}">
                        <div class="d-flex" style="height: 25vh">
                            <img src="{{$product->image}}" class="card-img-top" alt="{{$product->title}}">
                        </div>

                        <div class="card-body" style="height: 12vh;
    overflow: hidden;
    text-overflow: ellipsis; ">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{$product->title}}</h5>  <span class="badge right fs-6">{{$product->price . ' руб'}}</span>
                            </div>
                        </div>
                    </a>
                </div>

            @endforeach


        </div>
        <div>
            {{$products->links('pagination::bootstrap-5')}}
        </div>
    </div>
@endsection
