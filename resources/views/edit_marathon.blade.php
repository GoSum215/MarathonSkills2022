@extends('layouts.app')

@section('title')
    Редактирование марафона
@endsection

@section('link_style')
    <link href="{{ asset('../css/edit_marathon.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/edit_marathon_mobile.css') }}" />
@endsection

@section('content')
    <div class="main_div all">
        <div class="name_block">
            <h1>Редактирование марафона</h1>
        </div>
        <form class="form_block" action="" method="get" name="add_new_marathon">
            <div class="data_div">
                <div>
                    <label for="name">Название марафона:</label>
                    <input type="text" name="name"  size="25">
                </div>
                <div>
                    <label for="country">Страна:</label>
                    <input type="text" name="country" size="25">
                </div>
                <div>
                    <label for="city">Город:</label>
                    <input type="text" name="city"  size="25">
                </div>
                <div>
                    <label for="date">Дата:</label>
                    <input type="text" name="date"  size="25">
                </div>
                <div>
                    <label for="price">Цена:</label>
                    <input type="text" name="price"  size="25">
                </div>
                <div class="description">
                    <label id="description_label" for="description">Описание марафона:</label>
                    <input id="description" type="text" name="description"/>
                </div>
            </div>
            <!-- выбор дисстанций -->
            <div class="name_column">
                <div>Дисстанции:</div>
                <div>Название дисстанций:</div>
            </div>
            <div class="distance_div">
                <div>
                    <label for="5km">5 км</label>
                    <input id="check5" type="checkbox">
                    <input type="text" name="5km" id="5km" size="25">
                </div>
                <div>
                    <label for="10km">10 км</label>
                    <input id="check10" type="checkbox">
                    <input type="text" name="10km" id="10km" size="25">
                </div>
                <div>
                    <label for="21km">21 км</label>
                    <input id="check21" type="checkbox">
                    <input type="text" name="21km" id="21km" size="25">
                </div>
                <div>
                    <label for="42km">42 км</label>
                    <input id="check42" type="checkbox">
                    <input type="text" name="42km" id="42km" size="25">
                </div>
            </div>
            <div class="sub"><input type="submit" value="Сохранить изменения"></div>
        </form>
    </div>
@endsection
