<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">
    <link href="{{ asset('css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div class="site-logo"><a href="/">{{ config('app.name', 'Laravel') }}</a></div>
                <div class="ml-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="#first" class="nav-link">Для кого</a></li>
                            <li><a href="#second" class="nav-link">Как это работает</a></li>
                            <li><a href="#third" class="nav-link">Как применить</a></li>
                            <li><a href="{{route('profile.show')}}" class="nav-link">Профиль</a></li>
                        </ul>
                    </nav>
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right"><span
                            class="icon-menu h3"></span></a>
                </div>

            </div>
        </div>

    </header>

    {{--    <a id="bgndVideo" class="player"--}}
    {{--       data-property="{videoURL:'https://www.youtube.com/watch?v=w-cRWOjlk8c',showYTLogo:false, showAnnotations: false, showControls: false, cc_load_policy: false, containment:'#home-section',autoPlay:true, mute:true, startAt:255, stopAt: 271, opacity:1}">--}}
    {{--    </a>--}}

    <div class="intro-section" id="home-section">
        <div class="container">

            <div class="row align-items-center">
                <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                    <h1 class="mb-3">Аварийный QR-код</h1>
                    <p class="lead mx-auto desc mb-5">Решение для Вашей безопасности.
                        <br>
                    <span style="font-weight: bold">«В непредвиденной ситуации человек не возвышается до уровня своих ожиданий, но опускается до уровня своей подготовки».</span>
                        <br>
                        Быть готовым, заранее создав возможность для экстренной связи- теперь просто и удобно!
                    </p>
                    <p class="text-center">
                        <a href="{{route('profile.show')}}"
                           class="btn btn-outline-white py-3 px-5">Зарегистрироваться</a>
                    </p>
                </div>
            </div>

        </div>
    </div>


    <div class="site-section" id="first">
        <div class="container">

            <div class="row justify-content-center align-items-center text-left mb-5">
                <div class="col-md-12 section-heading">
                    <h2 class="heading mb-3 text-center">Для кого полезно?</h2>
                    <p>
                    <ul class="list-unstyled">
                        <li><span style="font-weight: bold">1. Путешественники:</span> <br>
                            Отправляясь в путешествие, разместите Аварийный QR-код на личных вещах и имуществе, тем самым значительно увеличив шанс на информирование о пропаже и создав возможность для связи в непредвиденной ситуации.
                        </li>

                        <li><span style="font-weight: bold">2. Дети:</span> <br>
                            Разместите Аварийный QR-код на личных вещах ребенка – создайте возможность для связи в случае их утери.:
                            Отправляясь в путешествие, разместите Аварийный QR-код на личных вещах и имуществе, тем самым значительно увеличив шанс на информирование о пропаже и создав возможность для связи в непредвиденной ситуации.
                        </li>
                        <li><span style="font-weight: bold">3. Пожилые люди:</span> <br>
                            Наличие Аварийного QR-кода с краткой информацией о здоровье может сыграть ключевую роль в случае ЧП.
                        </li>
                        <li><span style="font-weight: bold">4. Люди с хроническими заболеваниями:</span> <br>
                            Для тех, кто нуждается в оперативном предоставлении медицинской информации, Аварийный QR-код станет незаменимым инструментом информирования.
                        </li>
                        <li><span style="font-weight: bold">Персонализация:</span> <br>
                             Разместите в профиле контакты для связи, краткое описание, медицинские данные или особенности здоровья, чтобы помощь окружающих была максимально оперативной и точной.
                        </li>

                    </ul>
                    </p>
                </div>
            </div>

            <!-- Slider -->
            <div class="owl-carousel nonloop-block-14 block-14" data-aos="fade">

                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/info.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Информация в быстром доступе</h2>
                            <p>Важные сведения на случай ЧП в Вашем профиле</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/phone.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Простое решение для важных ситуаций.</h2>
                            <p>Разместите стикер с Аварийным QR-кодом в любом удобном месте</p>
                        </div>
                    </div>
                </div>
{{--                <div class="slide">--}}
{{--                    <div class="ftco-feature-1">--}}
{{--                        <img src="{{asset('images/icons/map.svg')}}" style="height: 80px; margin: 20px 0;">--}}
{{--                        <div class="ftco-feature-1-text">--}}
{{--                            <h2>Местоположение</h2>--}}
{{--                            <p>Твоих близких смогут всегда предупредить в чрезвычайных случаях</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/monitor.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Без ограничений</h2>
                            <p>Защита 24/7. Редактируйте свои данные в любое время</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="bgimg" id="second" style="background-image: url('images/second.webp');"
         data-stellar-background-ratio="0.5">

        <div class="container">
            <div class="row align-items-center justify-content-center text-center text-white">
                <div class="col-md-7">
                    <h2>Как это работает?</h2>
                    <h4 class="text-white">Разместите стикер с Вашим персональным Аварийным QR-кодом на личных вещах, транспорте, багаже, или ином имуществе - создайте возможность связаться с Вами в случае непредвиденной ситуации.</h4>
                </div>
            </div>
        </div>

    </div>
    <div class="site-section" style="padding-top: 2rem ;padding-bottom: 2rem;">
        <div class="container">
            <div class="row align-items-center justify-content-center text-left">
                <div class="col-md-12 fs-5">
                    <ul class="list-unstyled">


                        <li> 1. На случай непредвиденых обстоятельств:

                        Заполните контактную информацию на странице для связи с близкими в случае черезвычайного проишествия.     </li>


                        <li>  2. Удобство использования: Для получения доступа к размещаемой информации достаточно отсканировать QR-код с помощью смартфона и перейти на Вашу страницу профиля.     </li>


                        <li>  3. Многофункциональность использования: Разместите стикер с аварийным QR кодом на личных вещах, транспорте, багаже-оставьте возможность связаться с Вами в случае утери личного имущества.     </li>


                        <li>  4. Снижение уровня тревоги: В непредвиденной ситуации наличие QR-кода облегчит жизнь как самому пользователю, предоствив возможность связаться с ним, так и медицинским работникам, которые быстро получат необходимые данные для связи с близкими     </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="site-section" id="third">
        <div class="container">
            <div class="row justify-content-center text-left mb-5">
                <div class="col-md-8  section-heading">
                    <h2 class="heading mb-3 text-center"> Как воспользоваться?</h2>
                    <p>
                        <span style="font-weight: bold">1. Зарегистрируйте аккаунт:</span> пройдите быструю регистрацию на сайте. <br>
                        <span style="font-weight: bold">2. Заполните информацию:</span> добавьте необходимую контактную информацию.<br>
                        <span style="font-weight: bold">3. Оплатите подписку:</span> обеспечьте постоянную поддержку ваших контактных данных.<br>
                        <span style="font-weight: bold">4. Закажите наклейки:</span> оформите заявку на стикеры с уникальным QR-кодом прямо через Ваш профиль на сайте<br>
                        <span style="font-weight: bold">5. Получите готовые стикеры с QR кодом.</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center text-left mb-5">
                <div class="col-md-8  section-heading">
                    <h2 class="heading mb-3 text-center">Стоимость</h2>
                    <p>
                        <span style="font-weight: bold">Годовая подписка на Аварийный QR код стоит</span> всего <span style="font-weight: bold">365 рублей</span> или <span style="font-weight: bold">1 рубль в день</span>. Приобретая подписку, вы получаете простой и надежный инструмент для экстренной связи.
                        <br>
                        <span style="font-weight: bold">  Позаботьтесь о себе и своих близких —</span> закажите аварийный QR-код уже сегодня и будьте готовы к любым непредвиденным обстоятельствам.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-section" style="padding: 0 0 0 0!important; ">
        <p class="text-center"> Авторское право ©
            <script>document.write(new Date().getFullYear());</script>
            Все права защищены <br>
            <a href="{{route('terms')}}">Пользовательское соглашение и условия доставки</a>
        </p>
    </footer>


</div>
<!-- .site-wrap -->

<script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script src="{{ asset('js/popper.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('js/jquery.stellar.min.js')}}"></script>
<script src="{{ asset('js/jquery.countdown.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('js/aos.js')}}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{ asset('js/jquery.sticky.js')}}"></script>
<script src="{{ asset('js/jquery.mb.YTPlayer.min.js')}}"></script>


<script src="{{ asset('js/main.js')}}"></script>

</body>

</html>
