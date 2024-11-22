@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($user->paid)
                    <div class="card">
                        <div class="card-header">{{ __('Аварийная информация') }}</div>
                        <div class="card-body table-responsive">
                            @if($user->type == 'standard')
                                <div class="row">
                                    {{--                                    <div class="col-sm-6">--}}
                                    {{--                                        <div class="form-group" style="width: 200px">--}}
                                    {{--                                            <img src="{{asset($user->img)}}" alt="" style="width: 100%">--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Имя:</label>
                                            <h6>{{$user->name}}</h6>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Телефон:</label>
                                            <h6>{{$user->phone}}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label>Личная информация:</label>
                                        <p >{{$user->information}}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                @foreach($user->contacts() as $contact)
                                <div class="col-md-4 col-sm-6 col-12 pt-1">
                                    <div class="light-box" style="background-color: #343a40; color: white; border-radius: 2.5%">
                                        <div class="info-box-content" style="padding: 0.3rem">
                                            <span class="info-box-text">{{$contact->name}}</span>
                                            <br>
                                            <span class="info-box-text">{{$contact->role}}</span>
                                            <br>
                                            <span class="info-box-text">{{$contact->type}}: </span>
                                            <span class="info-box-text">{{$contact->contact}}</span>
                                        </div>

                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                @else
                    <div class="card">
                        <h2 class="card-header text-center">{{ __('Подписка не оплачена') }}</h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <style>
        .row {
            margin-bottom: 1rem;
        }
    </style>
@endsection
