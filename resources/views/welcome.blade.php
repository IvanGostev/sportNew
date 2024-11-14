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
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
</style>
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
                    <p class="lead mx-auto desc mb-5">

                        Представьте себе, что у вас есть возможность повысить свою безопасность и безопасность ваших
                        близких всего одним простым шагом.
                        <span style="font-weight: bold">Аварийный QR-код —решение</span> , которое обеспечит быстрый
                        доступ к важной информации в экстренных ситуациях.
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
                    <h2 class="heading mb-3 text-center">Почему вам стоит воспользоваться Аварийным QR-кодом?</h2>
                    <p>
                    <ul class="list-unstyled">
                        <li><span style="font-weight: bold">1. Повышение безопасности:</span> <br>
                            Разместив QR-код на личные вещи или одежду, вы увеличиваете шансы на возврат потерянных
                            вещей. Это особенно актуально для путешественников и детей.
                        </li>

                        <li><span style="font-weight: bold">2. Быстрый доступ к контактной информации:</span> <br>
                            В случае непредвиденной ситуации, любой, кто просканирует ваш <span
                                style="font-weight: bold">Аварийный QR-код</span>, сможет мгновенно получить доступ к
                            контактам для связи, медицинской информации и другими размещенными Вами сведениям.
                        <li><span style="font-weight: bold">3. Удобство для пожилых людей и людей с хроническими заболеваниями:</span>
                            <br>
                            Наличие <span style="font-weight: bold">Аварийного QR-кода</span> с хроникой болезни или
                            нужными контактами может быть жизненно важным в экстренной ситуации, когда каждая секунда на
                            счету.
                        </li>
                        <li><span style="font-weight: bold">4. Легкость использования:</span> <br>
                            Создание и размещение <span style="font-weight: bold">Аварийного QR-кода</span> не требует
                            специальных навыков. Просто зарегистрируйтесь, создайте профиль укажите необходимую
                            информацию и разместите его там, где он будет максимально эффективен.
                        </li>
                        <li><span style="font-weight: bold">5. Спокойствие:</span> <br>
                            Зная, что у вас есть механизм для быстрой помощи, вы можете чувствовать себя более уверенно
                            в любом путешествии или повседневной ситуации.
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
                            <p>Важные сведения на случай ЧП в Вашем профиле.</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/phone.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Простое решение для важных ситуаций.</h2>
                            <p>Разместите стикер с <span style="font-weight: bold">Аварийным QR-кодом<span> в любом удобном месте
                            </p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/monitor.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Без ограничений</h2>
                            <p>Защита 24/7. Редактируйте свои данные в любое время.</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/monitor.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Без ограничений</h2>
                            <p>Защита 24/7. Редактируйте свои данные в любое время.</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="ftco-feature-1">
                        <img src="{{asset('images/icons/map.svg')}}" style="height: 80px; margin: 20px 0;">
                        <div class="ftco-feature-1-text">
                            <h2>Подписка стоит всего 1 рубль в день.</h2>
                            <p>Приобретая подписку, вы получаете простой и надежный инструмент для экстренной связи.</p>
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
                    <h4 class="text-white">Разместите стикер с Вашим персональным Аварийным QR-кодом на личных вещах,
                        транспорте, багаже, или ином имуществе - создайте возможность связаться с Вами в случае
                        непредвиденной ситуации.</h4>
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

                            Заполните контактную информацию на странице для связи с близкими в случае черезвычайного
                            проишествия.
                        </li>


                        <li> 2. Удобство использования: Для получения доступа к размещаемой информации достаточно
                            отсканировать QR-код с помощью смартфона и перейти на Вашу страницу профиля.
                        </li>


                        <li> 3. Многофункциональность использования: Разместите стикер с аварийным QR кодом на личных
                            вещах, транспорте, багаже-оставьте возможность связаться с Вами в случае утери личного
                            имущества.
                        </li>


                        <li> 4. Снижение уровня тревоги: В непредвиденной ситуации наличие QR-кода облегчит жизнь как
                            самому пользователю, предоствив возможность связаться с ним, так и медицинским работникам,
                            которые быстро получат необходимые данные для связи с близкими
                        </li>

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
                        1. Зарегистрируйте аккаунт: пройдите быструю регистрацию на сайте. <br>
                        2. Заполните информацию: добавьте необходимую контактную информацию. <br>
                        3. Оплатите подписку: обеспечьте постоянную поддержку ваших контактных данных. <br>
                        4. Закажите наклейки: оформите заявку на стикеры с уникальным <span style="font-weight: bold">Аварийным QR-кодом</span>
                        через Ваш профиль на сайте <br>
                        5. Получите готовые стикеры с <span style="font-weight: bold">Аварийным QR-кодом</span> в
                        ближайшем ПВЗ.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center text-left mb-5">
                <div class="col-md-8  section-heading">
                    <h2 class="heading mb-3 text-center">Стоимость</h2>
                    <p>
                        <span style="font-weight: bold">Годовая подписка на Аварийный QR код стоит</span> всего <span
                            style="font-weight: bold">365 рублей</span> или <span style="font-weight: bold">1 рубль в день</span>.
                        Приобретая подписку, вы получаете простой и надежный инструмент для экстренной связи.
                        <br>
                        <span style="font-weight: bold">  Позаботьтесь о себе и своих близких —</span> закажите
                        аварийный QR-код уже сегодня и будьте готовы к любым непредвиденным обстоятельствам.
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
