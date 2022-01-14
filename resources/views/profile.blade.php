@extends('layouts.app')

@section('title')
    Профиль
@endsection

@section('link_style')
    <link href="{{ asset('../css/profile.css') }}" rel="stylesheet">
    <link rel="stylesheet" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/profile_mobile.css') }}">
@endsection

@section('content')
    <div class="profileBlock">
        <a>Личный кабинет</a>
        <div class="profileInfo">
            <div class="imageName">
                <img src="../images/photo.jpg">
                <a style="align-self: center">{{ $user->surname }} {{ $user->name }}</a>
            </div>
            <div class="infoBlock">
                <a>Логин: {{ $user->login }}</a>
                <a>Почта: {{ $user->email }}</a>
{{--                <div class="myrunsButton">
                    <a>Мои забеги</a>
                </div>--}}
            </div>
        </div>
    </div>
@endsection
