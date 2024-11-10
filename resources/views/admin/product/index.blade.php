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
                                <form class="row" action="{{route('admin.product.index')}}"
                                      style="display: flex ;align-items: flex-end">
                                    <div class="col-sm-12 col-md-2">
                                        <a href="{{ route('admin.product.create') }}"
                                           class="btn btn-block btn-outline-light">Добавить</a>
                                        <br>
                                        <div>
                                            <div class="fw-bold fs-6">Название</div>
                                            <div class="fht-cell">
                                                <div class="filter-control">
                                                    <input type="text" value="{{request()['title'] ?? ''}}" name="title"
                                                           class="form-control" placeholder="Текст ...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12  col-md-2 d-flex gap-2">
                                        <button class="btn btn-light mt-3" tabindex="0"
                                                aria-controls="example1" type="submit"><span>Поиск</span></button>
                                        <a href="{{route('admin.product.index')}}" class="btn btn-secondary mt-3"
                                           tabindex="0"
                                           aria-controls="example1" type="submit"><span>Сбросить</span></a>
                                    </div>
                                </form>
                                <br>
                                <h3 class="card-title">Товары</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Превью</th>
                                        <th>Название</th>
                                        <th style="width: 40px">Описание</th>
                                        <th style="width: 40px">Цена</th>
                                        <th style="width: 40px">Редактировать</th>
                                        <th style="width: 40px">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <img src="{{asset($product->image)}}" style="height: 10rem">
                                            </td>
                                            <td>{{$product->title}}</td>

                                            <td>{{$product->description}}</td>
                                            <td>{{$product->price . ' руб'}}</td>
                                            <td>
                                                <a href="{{ route('admin.product.edit', $product->id) }}"
                                                  class="btn btn-light btn-sm">Редактировать
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.product.destroy', $product->id) }}"
                                                      method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-light btn-sm">Удалить
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $products->withQueryString()->links() }}
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
