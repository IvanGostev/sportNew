@extends('layouts.app')
@section('content')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
    <div class="container">
        <div class="row mt-4">
            <h3>Товары к заказу от {{$order->created_at}}</h3>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Превью</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Количество</th>
                        <th>Стоимость</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products() as $product)
                        <tr>
                            <td>
                                <img src="{{asset($product->product()->image)}}" alt="{{$product->image}}"
                                     style="height: 7rem">
                            </td>
                            <td>{{$product->product()->title}}</td>
                            <td>{{$product->product()->description}}</td>
                            <td>{{$product->qty}}</td>
                            <td>{{$product->qty * $product->price . ' руб'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
@endsection
