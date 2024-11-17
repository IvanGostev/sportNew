@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if((!auth()->user()->test_period) and (!auth()->user()->paid))
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пробный период на три дня</h3>
                            <form class="card-tools" method="post" action="{{route('payment.test')}}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append" style="margin-left: 5px;">
                                        <button type="submit" class="btn btn-outline-light">Активировать</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->subscription_days == 3 and auth()->user()->paid)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пробный период активен
                                до {{\Carbon\Carbon::create(auth()->user()->day_pay)->addDays(auth()->user()->subscription_days)->toDateString()}}</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-append" style="margin-left: 5px;">
                                        <a href="{{route('subscription.index')}}" class="btn btn-outline-light">Купить
                                            полную подписку
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif(auth()->user()->subscription_days > 3)
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Подписка {{auth()->user()->subscription_days}} дней активна
                                до {{\Carbon\Carbon::create(auth()->user()->day_pay)->addDays(auth()->user()->subscription_days)->toDateString()}}</h3>
                            <p class="text">
                               Авто продление {{auth()->user()->autorenewal ? "включено" : "отключено"}} изменить можно
                                <a href="{{route('subscription.show')}}">здесь</a>
                            </p>
                        </div>
                    </div>
                @endif
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Контакты</h3>
                        <form class="card-tools" method="post" action="{{route('contact.store')}}">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input required type="text" name="name" class="form-control float-right"
                                       placeholder="Имя">
                                <input required type="text" name="role" class="form-control float-right"
                                       placeholder="Кем приходиться">
                                <input required type="text" name="type" class="form-control float-right"
                                       placeholder="Тип контакта">
                                <input required type="text" name="contact" class="form-control float-right"
                                       placeholder="Контакт">
                                <div class="input-group-append" style="margin-left: 5px;">
                                    <button type="submit" class="btn btn-outline-light">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Кем приходиться</th>
                                <th>Тип контакта</th>
                                <th>Контакт</th>
                                <th style="width: 40px"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(auth()->user()->contacts() as $contact)
                                <tr>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->role}}</td>
                                    <td>{{$contact->type}}</td>
                                    <td>{{$contact->contact}}</td>
                                    <td>
                                        <form method="post" action="{{route('contact.delete', $contact->id)}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-light">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <br>
                <form class="card" method="post" action="{{route('profile.update')}}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-header">{{ __('Ваш профиль') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group" style="background-color: white; width: 200px">
                                    {!! $qrcode !!}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-sm-12   d-flex gap-2 ">
                                    <div class="d-block">
                                        <a href="{{trim(explode('public', $path)[1])}}" download
                                           class="btn  btn-outline-light">Скачать
                                            qrcode</a>

                                    </div>
                                    <div class="d-block">

                                        <a href="{{route('main.show', auth()->user()->id)}}"
                                           class="btn  btn-light">Посмотреть
                                            профиль</a>

                                    </div>
                                </div>

                                <br>
                                <div class="form-group">
                                    <label>Прямая ссылка на ваш профиль</label>
                                    <input type="text" class="form-control" placeholder="Текст ..."
                                           value="{{route('main.show', auth()->user()->id)}}" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Тип отображения профиля</label>
                                    <select name="type" id="" required class="form-control">
                                        <option
                                            {{auth()->user()->type == 'standard' ? 'selected' : ''}} value="standard">
                                            Стандартный
                                        </option>
                                        <option
                                            {{auth()->user()->type == 'contacts' ? 'selected' : ''}} value="contacts">
                                            Контакты
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                {{--                            <div class="form-group" style="width: 200px">--}}
                                {{--                                <img src="{{asset(auth()->user()->img)}}" alt="" style="width: 100%">--}}
                                {{--                            </div>--}}
                                <div class="form-group">
                                    <label>Полное имя</label>
                                    <input type="text" class="form-control" required name="name"
                                           placeholder="Текст ..."
                                           value="{{auth()->user()->name}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {{--                            <div class="form-group">--}}
                                {{--                                <label>Фотография</label>--}}
                                {{--                                <input type="file" class="form-control" name="img" placeholder="Текст ..." value="{{auth()->user()->name}}">--}}
                                {{--                            </div>--}}
                                {{--                            <br>--}}

                                <div class="form-group">
                                    <label>Телефон</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Номер ..."
                                           value="{{auth()->user()->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Личная информация (Группа крови, аллергии и т.д)</label>
                                <textarea placeholder="Текст ..." class="form-control" name="information" id=""
                                          cols="30" rows="10">{{auth()->user()->information}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-light">Сохранить</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <style>
        .row {
            margin-bottom: 1rem;
        }
    </style>
@endsection
