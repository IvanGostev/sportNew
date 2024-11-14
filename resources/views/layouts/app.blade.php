<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div id="app dark">
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('profile.show') }}">
                                <i class="fa-regular fa-user"></i>
                                {{ __(' Профиль')}}

                            </a>
                        </li>
                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('subscription.show') }}">
                                <i class="fas fa-wallet"></i>
                                {{ __(' Моя подписка')}}

                            </a>
                        </li>
                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('order.index') }}">
                                <i class="fa-solid fa-border-all"></i>
                                {{ __(' Мои заказы')}}

                            </a>
                        </li>
                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('product.index') }}">
                                <i class="fa-solid fa-shop"></i>
                                {{ __(' Магазин')}}  </a>

    </li>

                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i
                                    class="fas fa-shopping-cart"></i>
                                {{ __(' Корзина') }}
                            </a>
                        </li>
                        @if(auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.user.index') }}">
                                <i class="fa-solid fa-table-columns"></i>
                                {{ __(' Админ панель') }}
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">


                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
