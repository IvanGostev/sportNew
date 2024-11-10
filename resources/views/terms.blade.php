@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Политика конфиденциальности') }}</div>
                    <div class="card-body">
                        <a download href="/documents/PersonalDataProcessingPolicy.docx">Скачать</a>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">{{ __('Пользовательское соглашение') }}</div>
                    <div class="card-body">
                        <a download href="/documents/UserAgreement.docx">Скачать</a>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">{{ __('Согласие на обработку персональных данных') }}</div>
                    <div class="card-body">
                        <a download href="/documents/ConsentToTheProcessingOfPersonalData.docx">Скачать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .row {
            margin-bottom: 1rem;
        }
    </style>
@endsection
