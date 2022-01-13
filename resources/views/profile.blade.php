@extends('layouts.app')

@section('title')
    Профиль
@endsection

@section('link_style')
    {{--<link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />--}}
@endsection

@section('content')
    <h1>{{ $user->login }}</h1>
    <p> Role: {{ $user->role }}</p>
    <p> {{ $user->surname }}</p>
    <p> {{ $user->name }}</p>
    <p> {{ $user->email }}</p>
@endsection
