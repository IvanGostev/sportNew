@extends('admin.layouts.main')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-dark">
                            <div class="card-header">
                                <h3 class="card-title">Редактирование товара</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('admin.product.update', $product->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body table-responsive p-0">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" name="title" class="form-control"
                                                       placeholder="Текст ..." required value="{{$product->title}}">
                                            </div>
                                            <div class="form-group">
                                                <!-- <label for="customFile">Custom File</label> -->
                                                <div style="height: 180px">
                                                    <img id="blah1" alt="insert an image" width="auto" height="180px"
                                                         src="{{asset($product->image)}}" >
                                                </div>
                                                <br>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile"
                                                           name="image"
                                                           onchange="document.getElementById('blah1').src = window.URL.createObjectURL(this.files[0])">
                                                    <label class="custom-file-label" for="customFile">Выберите превью</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Цена</label>
                                                <input type="text" name="price" class="form-control"
                                                       placeholder="Цена ..." required value="{{$product->price}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <textarea  class="form-control" rows="8"
                                                           name="description" placeholder="Текст..." >{{$product->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-light">Создать</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
