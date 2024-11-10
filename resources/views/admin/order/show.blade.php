@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper" style="min-height: 1302.4px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Товары в заказе для {{$order->address}}</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Превью</th>
                                        <th>Название</th>
                                        <th style="width: 40px">Описание</th>
                                        <th style="width: 40px">Количество товаров</th>
                                        <th style="width: 40px">Цена</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->products() as $product)
                                        <tr>
                                            <td>
                                                <img src="{{asset($product->product()->image)}}"  style="height: 7rem">
                                            </td>
                                            <td>{{$product->product()->title}}</td>
                                            <td>{{$product->product()->description}}</td>
                                            <td>{{$product->qty}}</td>
                                            <td>{{$product->price * $product->qty . ' руб'}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- /.card-body -->

                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
