@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="row" style="min-height: 50vh">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap" style="height: 50vh">
                            <div><img style="width: 100%; height: 50vh!important; border-radius:  0.375rem;"
                                      src="{{asset($product->image)}}">
                            </div>
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <form class="card-body p-2 " action="{{route('cart.store', $product->id)}}" method="post">
                        @csrf
                        <div class="row align-items-start">
                            <h3 class="title mb-3">{{$product->title}}</h3>

                            <p class="price-detail-wrap">
	<span class="price h3 text-primary">
		<span class="num">{{$product->price}}</span><span class="currency"> Руб</span>
	</span>
                            </p>
                            <dl class="item-property">
                                <dt class="fs-5">Описание:</dt>
                                <dd><p class="fs-5">{{$product->description}}</p></dd>
                            </dl>
                        </div>
                        @if(!checkProductInCart($product->id))
                            <div class="row align-items-end">
                                <hr>
                                <div class="col-sm-5">
                                    <dl class="param param-inline">
                                        <dt class="fs-5 mb-1">Количество:</dt>
                                        <dd>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button type="button"
                                                        class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                    <i class="fas fa-minus"></i>
                                                </button>

                                                <input id="form1" min="0" name="quantity" value="1" type="number"
                                                       style="width: 4vw;"
                                                       class="form-control fs-6"/>

                                                <button type="button"
                                                        class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </dd>
                                    </dl>  <!-- item-property .// -->
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->

                            {{--                        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>--}}

                            <button class="btn btn-lg btn-outline-primary text-uppercase"><i
                                    class="fas fa-shopping-cart"></i> Добавить в корзину
                            </button>
                        @else
                            <a href="{{route('cart.index')}}" class="btn btn-lg btn-primary text-uppercase"><i
                                    class="fas fa-shopping-cart"></i> В корзине
                            </a>
                        @endif
                    </form> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->

        </div>
        <br>

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
                                <h5 class="card-title">{{$product->title}}</h5>
                            </div>
                        </a>
                    </div>

                @endforeach


            </div>

    </div>
@endsection
