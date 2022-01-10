@extends('layouts.app')

@section('title')
    Информация о марафоне
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/info_about_marathon.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/info_about_marathon_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class="main_div all">
        <div class="name_block">
            <h1>Кросс “Быстрый пёс”</h1>
        </div>
        <div class="info_block">
            <div class="place_info">
                <div class="info_block_text">Дата: 17.04.2022</div>
                <div class="info_block_text">Город: Владивосток</div>
                <div class="info_block_text">Страна: Россия</div>
            </div>
            <div class="description">
                <div class="info_block_text">Внезапно, путь этого марафона будет проходить по мостам Владивостока. Наслаждайтесь видами города!</div>
            </div>
            <div class="photo_block">
                <img class="photo" src="{{ asset('../images/foto_marathona.png') }}" alt="photo">
            </div>
        </div>

        <div class="form_block">
            <div class="distance info_block_text">Выбор дисстанции:</div>
            <form action="" method="get" name="distance">
                <div class="input_block">
                    <input type="radio" id="distance1" name="distance" class="custom_checkbox" value="5" checked>
                    <label for="distance1">5км</label>

                    <input type="radio" id="distance2" name="distance" class="custom_checkbox" value="21" >
                    <label for="distance2">21км</label>

                    <input type="radio" id="distance3" name="distance" class="custom_checkbox" value="42" >
                    <label for="distance3">42км</label>
                </div>
                <div class="sub"><input type="submit" value="Зарегестрироваться"></div>
            </form>
        </div>
    </div>
@endsection
