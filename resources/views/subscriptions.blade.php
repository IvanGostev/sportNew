@extends('layouts.app')
@section('content')

    <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="container py-3">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Подписки</h1>
                    <p class="fs-5 text-muted">Выбор между ежемесячной и ежегодной подпиской зависит от ваших нужд,
                        финансовых возможностей и планов использования функционала Аварийного QRкода. Если вы не
                        уверены, лучше начать с ежемесячной подписки и, при необходимости, перейти на ежегодную, когда
                        будете уверены в своём выборе.</p>
                </div>

                <main>
                    <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Месяц</h4>
                                </div>
                                <form class="card-body" action="{{route('payment.purchase-subscription')}}" method="post">
                                    @csrf
                                    <h1 class="card-title pricing-card-title">30 руб</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li> Подписка позволяет пользователю получить доступ к услуге размещения на
                                            протяжении одного месяца (30 дней)
                                        </li>

                                        <li> Гибкость:Вы можете отменить подписку в любое время, что делает ее удобной
                                            для тех, кто хочет использовать услуги временно или проверить их перед
                                            долгосрочным обязательством.
                                        </li>


                                        <li> Более низкая начальная стоимость по сравнению с ежегодной подпиской.</li>

                                        <li> Легче управлять финансами в краткосрочной перспективе.</li>

                                        <li> Подходит для тех, кто не планирует интенсивное использование услуги
                                            размещения аварийного QR кода или намереваться воспользоваться ей на период
                                            путешествия.
                                        </li>
                                    </ul>
                                    <input hidden name="user_id" value="{{auth()->user()->id}}">
                                    <input hidden name="m" value="1">
                                    <button type="submit" class="w-100 btn btn-lg btn-primary">Приобрести</button>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-white bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Год</h4>
                                </div>
                                <form class="card-body" action="{{route('payment.purchase-subscription')}}" method="post">
                                    @csrf
                                    <h1 class="card-title pricing-card-title">365 руб</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Подписка предоставляет доступ к контенту или услугам на целый год (365 дней)
                                            с момента активации.
                                        </li>
                                        <li> Устойчивость: Пользователи могут быть уверены в доступе к услугам
                                            длительное время без необходимости выполнять ежемесячные платежи.
                                        </li>
                                        <li> Консистентный доступ: Пользователи получают постоянный доступ к всему
                                            функционалу в течение года.
                                        </li>
                                        <li> Экономия средств в пересчете на месяц.</li>


                                        <li> - Отсутствие необходимости управлять подпиской каждый месяц и беспокоиться
                                            о продлениях.
                                        </li>

                                        <li> - Подходящая для регулярных пользователей, которые планируют активно
                                            использовать сервис в течение года.
                                        </li>
                                    </ul>
                                    <input hidden name="user_id" value="{{auth()->user()->id}}">
                                    <input hidden name="m" value="12">
                                    <button type="submit" class="w-100 btn btn-lg btn-primary">Приобрести</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </section>
@endsection
