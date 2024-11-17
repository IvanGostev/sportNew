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
{{--                                <form class="row" action="{{route('admin.order.index')}}"--}}
{{--                                      style="display: flex ;align-items: flex-end">--}}
{{--                                    <div class="col-sm-12 col-md-2">--}}
{{--                                        <div>--}}
{{--                                            <div class="fw-bold fs-6">Статус</div>--}}
{{--                                            <div class="fht-cell">--}}
{{--                                                <div class="filter-control">--}}
{{--                                                    <select name="status" id="" class="form-control">--}}
{{--                                                        <option--}}
{{--                                                            value="all" {{request()['status'] == 'all' ? 'selected' : '' }}>--}}
{{--                                                            Все--}}
{{--                                                        </option>--}}
{{--                                                        <option--}}
{{--                                                            value="Доставлен" {{request()['status'] == 'Доставлен' ? 'selected' : '' }}>--}}
{{--                                                            Доставлен--}}
{{--                                                        </option>--}}
{{--                                                        <option--}}
{{--                                                            value="В сборке" {{request()['status'] == 'В сборке' ? 'selected' : '' }}>--}}
{{--                                                            В сборке--}}
{{--                                                        </option>--}}
{{--                                                        <option--}}
{{--                                                            value="В доставке" {{request()['status'] == 'В доставке' ? 'selected' : '' }}>--}}
{{--                                                            В доставке--}}
{{--                                                        </option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12  col-md-2 d-flex gap-2">--}}
{{--                                        <button class="btn btn-light mt-3" tabindex="0"--}}
{{--                                                aria-controls="example1" type="submit"><span>Поиск</span></button>--}}
{{--                                        <a href="{{route('admin.order.index')}}" class="btn btn-secondary mt-3"--}}
{{--                                           tabindex="0"--}}
{{--                                           aria-controls="example1" type="submit"><span>Сбросить</span></a>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                                <br>--}}
                                <h3 class="card-title">Заказы</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Дата создания</th>
                                        <th>Request id</th>
                                        <th>Доставка от</th>
                                        <th>До</th>
                                        <th>Адрес доставки</th>
                                        <th>Товаров</th>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Телефон</th>
                                        <th>Ссылка для генерации QRCODE</th>
                                        <th>Статус</th>
                                        <th style="width: 40px">Подробнее</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->request_id}}</td>
                                            <td>{{$order->from}}</td>
                                            <td>{{$order->to}}</td>
                                            <td>{{$order->address}}</td>
                                            <td>{{$order->productCount()}}</td>
                                            <td>{{$order->user()->name}}</td>
                                            <td>{{$order->user()->email}}</td>
                                            <td>{{$order->user()->phone}}</td>
                                            <td>{{route('main.show', $order->user_id)}}</td>
                                            <td>
                                                <a class="btn btn-outline-light btn-sm" href="{{$order->sharing_url}}">Статус</a>
                                            </td>
                                            <td>
                                                <a href="{{route('admin.order.show', $order->id)}}"
                                                   class="btn btn-light btn-sm">Подробнее</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $orders->withQueryString()->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
