@extends('layouts.app')

@section('title')
    Информация о марафоне
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/info_about_marathon.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/info_about_marathon_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main_div all">
        <div class="name_block">
            <h1>{{ $marathon->marathon_name }}</h1>
        </div>
        <div class="info_block">
            <div class="place_info">
                <div class="info_block_text">Дата: {{ $marathon->date_start_marathon }}</div>
                <div class="info_block_text">Город: {{ $marathon->city_name }}</div>
                <div class="info_block_text">Страна: {{ $marathon->country }}</div>
            </div>
            <div class="description">
                <div class="info_block_text">{{ $marathon->description }}</div>
            </div>
            <div class="photo_block">
                <img class="photo" src="{{ asset('../images/foto_marathona.png') }}" alt="photo">
            </div>
        </div>

        <div class="form_block">
            <div class="distance info_block_text">Выбор дисстанции:</div>
            <form action="{{ route('reg_for_marathon', ['slug' => $slug]) }}" method="post" name="distance">
                @csrf
                <div class="input_block">
                    @if(isset($eve[0]))
                    <input type="radio" id="distance1" name="distance" class="custom_checkbox" value="0" required>
                    <label for="distance1">5км</label>
                    @endif
                    @if(isset($eve[1]))
                    <input type="radio" id="distance2" name="distance" class="custom_checkbox" value="1" required>
                    <label for="distance2">10км</label>
                    @endif
                    @if(isset($eve[2]))
                    <input type="radio" id="distance2" name="distance" class="custom_checkbox" value="2" required>
                    <label for="distance2">21км</label>
                    @endif
                    @if(isset($eve[3]))
                    <input type="radio" id="distance3" name="distance" class="custom_checkbox" value="3" required>
                    <label for="distance3">42км</label>
                    @endif
                </div>
                <div class="sub"><input type="submit" value="Зарегестрироваться"></div>
            </form>
        </div>
    </div>
@endsection
