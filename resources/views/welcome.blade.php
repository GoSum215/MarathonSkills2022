@extends('layouts.app')

@section('title')
    Марафон
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <div class='main'>
        <div class="button_div" id="info">
            <img src="../images/run.PNG">
            <div class="button">
                <a href="{{ route('list_marathons') }}">Просмотреть информацию о марафонах</a>
            </div>
        </div>
        <div class="button_div" id="calc">
            <img src="../images/Billy_Herrington.jpg">
            <div class="button">
                <a href="{{ route('calculator') }}">Калькуляторы BMI и BMR</a>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Auth::id() === 4)
            <div class="button_div" id="admin">
                <img src="../images/run2.PNG">
                <div class="button">
                    <a href="{{ route('add_marathon') }}">Добавить марафон</a>
                </div>
            </div>
        @endif
    </div>
@endsection
