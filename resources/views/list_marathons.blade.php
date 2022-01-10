@extends('layouts.app')

@section('title')
    Список марафонов
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/list_marathons.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/list_marathons_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <h1 class="all">Список забегов</h1>

    <div class="card all">
        <img class="collum1" src="{{ asset('../images/foto_marathona.png') }}" alt="фото марафона">
        <div class="collum2">
            <div class="row">17 апреля</div>
            <div class="row">Кросс "Быстрый пёс"</div>
            <div class="row">Какие-то ебеня хз</div>
        </div>
        <div class="collum2">
            <div class="row">2км 3км 5км</div>
            <div class="row">300$</div>
            <div class="more">Подробнее</div>
        </div>
    </div>

    <div class="card card_white all">
        <img class="collum1" src="{{ asset('../images/foto_marathona.png') }}" alt="фото марафона">
        <div class="collum2 collum2_white">
            <div class="row">17 апреля</div>
            <div class="row">Кросс "Быстрый пёс"</div>
            <div class="row">Какие-то ебеня хз</div>
        </div>
        <div class="collum2 collum2_white">
            <div class="row">2км 3км 5км</div>
            <div class="row">300$</div>
            <div class="more more_white">Подробнее</div>
        </div>
    </div>

    <div class="card all">
        <img class="collum1" src="{{ asset('../images/foto_marathona.png') }}" alt="фото марафона">
        <div class="collum2">
            <div class="row">17 апреля</div>
            <div class="row">Кросс "Быстрый пёс"</div>
            <div class="row">Какие-то ебеня хз</div>
        </div>
        <div class="collum2">
            <div class="row">2км 3км 5км</div>
            <div class="row">300$</div>
            <div class="more">Подробнее</div>
        </div>
    </div>
@endsection
