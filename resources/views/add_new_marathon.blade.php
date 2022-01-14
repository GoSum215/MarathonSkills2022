@extends('layouts.app')

@section('title')
    Добавить марафон
@endsection

@section('link_style')
    <link href="{{ asset('../css/add_new_marathon.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/add_new_marathon_mobile.css') }}" />
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main_div all">
        <div class="name_block">
            <h1>Создание марафона</h1>
        </div>
        <form class="form_block" action="{{ route('save_marathon') }}" method="POST" name="add_new_marathon">
            @csrf
            <div class="data_div">
                <div>
                    <label for="name">Название марафона:</label>
                    <input type="text" name="marathon_name"  size="25">
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
                    <label for="cost">Цена:</label>
                    <input type="text" name="cost"  size="25">
                </div>
                <div class="description">
                    <label id="description_label" for="description">Описание марафона:</label>
                    <textarea id="description" name="description" ></textarea>
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
                    <input type="checkbox" id="check5" onclick="showForm('5km')">
                    <input hidden type="text" name="5km" id="5km" size="25" placeholder="Введите название дисстанции">
                </div>
                <div>
                    <label for="10km">10 км</label>
                    <input id="check10" type="checkbox" onclick="showForm('10km')">
                    <input hidden type="text" name="10km" id="10km" size="25" placeholder="Введите название дисстанции">
                </div>
                <div>
                    <label for="21km">21 км</label>
                    <input id="check21" type="checkbox" onclick="showForm('21km')">
                    <input hidden type="text" name="21km" id="21km" size="25" placeholder="Введите название дисстанции">
                </div>
                <div>
                    <label for="42km">42 км</label>
                    <input id="check42" type="checkbox" onclick="showForm('42km')">
                    <input hidden type="text" name="42km" id="42km" size="25" placeholder="Введите название дисстанции">
                </div>
            </div>
            <div class="sub"><input type="submit" value="Зарегистрировать марафон"></div>
        </form>
    </div>
    <script>
        let i = 1;
        function showForm(id_input){
            if(document.getElementById(id_input).hidden == true){
                document.getElementById(id_input).hidden = false;
            }
            else{
                document.getElementById(id_input).hidden = true;
            }
        }
    </script>
@endsection
