@extends('layouts.app')

@section('title')
    Марафон
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class="marathonsInfo all">
        <div class="button">
            Посмотреть информацию о марафонах
        </div>
    </div>
    <div class="marathonsInfo all">
        <div class="button">
            Спонсировать бегуна
        </div>
    </div>
    <div class="marathonsInfo all">
        <div class="button">
            Информация об благотворительных организациях
        </div>
    </div>
    <div class="marathonsInfo all">
        <div class="button">
            Калькуляторы BMI и BMR
        </div>
    </div>
@endsection
