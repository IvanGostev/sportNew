@extends('layouts.app')
@section('content')

    <section class="h-100 h-custom">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#cart"
                           role="tab"  aria-selected="true">Корзина</a>
                        <a class="nav-item nav-link" id="delivery-tab" data-toggle="tab" href="#delivery"
                           role="tab"
                            aria-selected="false">Адрес доставки</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="cart" role="tabpanel" aria-labelledby="active-tab">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="fw-bold mb-0">Корзина</h3>
                                            <h6 class="mb-0 text-muted">{{productCount($products)}} товара</h6>
                                        </div>
                                        <hr class="my-4">
                                        @foreach($products as $product)
                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <img
                                                        src="{{asset(getProductById($product->id)->image)}}"
                                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="text-muted">{{getProductById($product->id)->title}}</h5>
                                                    {{--                                                    <h5 class="mb-0">{{$product->category()->title}}</h5>--}}
                                                </div>
                                                <form method="post" class="col-md-3  d-flex"
                                                      action="{{route('cart.quantity', $product->rowId)}}">
                                                    @csrf
                                                    @method('patch')
                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="1" name="quantity" value="{{$product->qty}}"
                                                           type="number"
                                                           class="form-control form-control-sm" />

                                                    <button data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-link px-2"
                                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </form>
                                                <div class="col-md-2  offset-lg-1">
                                                    <h5 class="mb-0">{{$product->price * $product->qty}} руб</h5>
                                                </div>
                                                <form class="col-md-1 text-end" method="post"
                                                      action="{{route('cart.delete', $product->rowId)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button href="#!" class="text-muted btn btn-link" type="submit"><i
                                                            class="fas fa-times"></i></button>
                                                </form>
                                            </div>
                                            <hr class="my-4">
                                        @endforeach
                                        <div class="pt-2">
                                            <h5 class="mb-0"><a href="{{route('product.index')}}" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Вернуться в магазин</a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-body-tertiary">
                                    <form id="cart__from" class="p-4" action="{{route('order.store')}}" method="post">
                                        @csrf
                                        @method('post')
                                        <h3 class="fw-bold pt-1">Данные</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="">Товаров: {{productCount($products)}}</h5>
                                            <h5>{{$total}} руб</h5>
                                        </div>
                                        {{--                                        <h5 class="mb-2">Адрес</h5>--}}
                                        {{--                                        <div class="mb-4">--}}
                                        {{--                                            <div data-mdb-input-init class="form-outline">--}}
                                                                                        <textarea hidden type="text" placeholder="Введите адрес доставки" required
                                                                                                  class="form-control form-control-lg " name="address" rows="2"></textarea>
                                        <input hidden  required type="text"
                                                  class="form-control form-control-lg " name="platform_id" >
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-3">
                                            <h5 class="">К оплате:</h5>
                                            <h5>{{$total}} руб</h5>
                                        </div>

                                        <a data-mdb-button-init data-mdb-ripple-init
                                           class="btn btn-dark btn-block btn-lg"
                                           data-mdb-ripple-color="dark" onclick="document.querySelector('#delivery-tab').click()" >Продолжить
                                        </a>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="delivery-tab">
                        <div class="card-body table-responsive p-0">
                            <div class="col-12">

                                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                    <script async src="https://ndd-widget.landpro.site/widget.js"></script>

                                    <div id="delivery-widget"></div>

                                    <!-- Код виджета -->
                                    <script>
                                        (function (w) {
                                            function startWidget() {
                                                w.YaDelivery.createWidget({
                                                    containerId: 'delivery-widget',   // Идентификатор HTML-элемента (контейнера), в котором будет отображаться виджет
                                                    params: {
                                                        city: "Москва",               // Город, отображаемый на карте
                                                        // Размеры виджета
                                                        size: {
                                                            "height": "450px",        // Высота
                                                            "width": "100%"           // Ширина
                                                        },
                                                        delivery_price: "от 100",     // Сумма доставки
                                                        delivery_term: "от 1 дня",    // Срок доставки
                                                        show_select_button: true,        // Отображение кнопки выбора пункта выдачи заказа (false - скрыть кнопку, true - показать кнопку)
                                                        filter: {
                                                            // Тип способа доставки
                                                            type: [
                                                                "pickup_point",       // Пункт выдачи заказа
                                                                "terminal"            // Постамат
                                                            ],
                                                            is_yandex_branded: false,   // Тип пункта выдачи заказа (false - Партнерские ПВЗ, true - ПВЗ Яндекса)
                                                            payment_methods_filter: "or", // Фильтр по способам оплаты
                                                            // Способ оплаты
                                                            payment_methods: [
                                                                "already_paid",       // Доступен для доставки предоплаченных заказов
                                                                "cash_on_receipt",    // Доступна оплата наличными при получении
                                                                "card_on_receipt"     // Доступна оплата картой при получении
                                                            ]
                                                        }
                                                    },
                                                });
                                            }

                                            w.YaDelivery
                                                ? startWidget()
                                                : document.addEventListener('YaNddWidgetLoad', startWidget);
                                        })(window);
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">


            </div>
        </div>
    </section>
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

    <script>
        document.addEventListener('YaNddWidgetPointSelected', function (data){
            $('[name="address"]').val(data.detail.address.full_address)
            $('[name="platform_id"]').val(data.detail.id)
            $('#cart__from').submit()
        });
    </script>
@endsection
