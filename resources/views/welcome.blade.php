@extends('layouts.app')

@section('title')
    Марафон
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    <a href="{{ route('list_marathons') }}" class="marathonsInfo all">
        <div class="button">
            Посмотреть информацию о марафонах
        </div>
    </a>
    @if(\Illuminate\Support\Facades\Auth::id() === 4)
    <a href="{{ route('add_marathon') }}" class="marathonsInfo all">
        <div class="button">
            Добавить марафон
        </div>
    </a>
    @endif
{{--    <div class="marathonsInfo all">
        <div class="button">
            Информация об благотворительных организациях
        </div>
    </div>--}}
    <a href="{{ route('calculator') }}" class="marathonsInfo all">
        <div class="button">
            Калькуляторы BMI и BMR
        </div>
    </a>
@endsection
