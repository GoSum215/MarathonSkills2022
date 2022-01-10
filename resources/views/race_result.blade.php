@extends('layouts.app')

@section('title')
    Результаты забегов
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/race_result.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/race_result_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class="card_ all">
        <img class="collum1_" src="{{ asset('../images/foto_marathona.png') }}" alt="photo">
        <div class="collum2_">
            <div class="row_">Кросс "Быстрый пёс"</div>
            <div class="row_ row_none"></div>
        </div>
        <div class="collum3_">
            <div class="row_ row_none"></div>
            <div class="row_">Дата проведения:</div>
            <div class="row_">17 апреля</div>
        </div>
    </div>

    <br><br><br>

    <div class="table all">
        <div class="row_table">
            <div class="number">1</div>
            <div class="fio">Иванов Иван Иванович</div>
            <div class="race_time">2, 15 мин</div>
            <div class="age">21 год</div>
            <img class="megal" src="{{ asset('../images/gold_medal.png') }}" alt="gold_medal">
        </div>
        <div class="row_table">
            <div class="number">1</div>
            <div class="fio">Иванов Иван Иванович</div>
            <div class="race_time">2, 15 мин</div>
            <div class="age">21 год</div>
            <img class="megal" src="{{ asset('../images/silver_medal.png') }}" alt="silver_medal">
        </div>
        <div class="row_table">
            <div class="number">1</div>
            <div class="fio">Иванов Иван Иванович</div>
            <div class="race_time">2, 15 мин</div>
            <div class="age">21 год</div>
            <img class="megal" src="{{ asset('../images/bronze_medal.png') }}" alt="bronze_medal">
        </div>
        <div class="row_table">
            <div class="number">1</div>
            <div class="fio">Иванов Иван Иванович</div>
            <div class="race_time">2, 15 мин</div>
            <div class="age">21 год</div>
        </div>
    </div>
@endsection
