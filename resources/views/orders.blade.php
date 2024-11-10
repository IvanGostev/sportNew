@extends('layouts.app')
@section('content')
    <style>
        a {
            text-decoration: none !important;
        }
    </style>
    <div class="container">
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#active"
                       role="tab" aria-controls="active" aria-selected="true">Активные</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#delivery" role="tab"
                       aria-controls="product-comments" aria-selected="false">Доставленные</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade active show" id="active" role="tabpanel" aria-labelledby="active-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Адрес</th>
                                <th>Дата создания</th>
                                <th>Статус</th>
                                <th>Товаров</th>
                                <th>Стоимость</th>
                                <th style="width: 40px">Подробнее</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersActive as $order)
                                <tr>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->productCount()}}</td>
                                    <td>{{$order->totalPrice() . ' руб'}}</td>
                                    <td>
                                        <a class="btn btn-light btn-sm" href="{{route('order.show', $order->id)}}">Подробнее</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Адрес</th>
                                <th>Дата создания</th>
                                <th>Статус</th>
                                <th>Товаров</th>
                                <th>Стоимость</th>

                                <th style="width: 40px">Подробнее</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersDelivery as $order)
                                <tr>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->productCount()}}</td>
                                    <td>{{$order->totalPrice() . ' руб'}}</td>

                                    <td>
                                        <a class="btn btn-light btn-sm" href="{{route('order.show', $order->id)}}">Подробнее</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
