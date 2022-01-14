@extends('layouts.app')

@section('title')
    Список марафонов
@endsection

@section('link_style')
    <link rel="stylesheet" href="{{ asset('../css/list_marathons.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/list_marathons_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="all">Список забегов</h1>
    <h4 class="all">{{ $marathons->links() }}</h4>
    @foreach($marathons as $i => $marathon)
    <div class="card @if($i % 2 === 1) card_white @endif all">
        <img class="collum1" src="{{ asset('../images/foto_marathona.png') }}" alt="фото марафона">
        <div class="collum2 @if($i % 2 === 1) collum2_white @endif">
            <div class="row">{{ $marathon->marathon_name }}</div>
            <div class="row">{{ $marathon->city_name }}</div>
            <div class="row">{{ $marathon->country }}</div>
        </div>
        <div class="collum2 @if($i % 2 === 1) collum2_white @endif">
            <div class="row">{{ $marathon->start_date }}</div>
            <div class="row">{{ $marathon->cost }}$</div>
            <a href="{{ route('info_marathon', ['slug' => $marathon->slug]) }}" class="more @if($i % 2 === 1) more_white @endif">Подробнее</a>
        </div>
    </div>
    @endforeach
    <h4 class="all">{{ $marathons->links() }}</h4>
@endsection
