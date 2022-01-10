@extends('layouts.app')

@section('title')
    Войти
@endsection

@section('link_style')
    {{--<link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />--}}
@endsection

@section('content')
    <h2>Войти</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
    <form method="POST" action="{{ route('login') }}" class="bordered">
        @csrf
        <div>
            <label>Login</label>
            <input name="login" type="text" value="{{ old('login') }}"/>
        </div>
        <div>
            <label>Password</label>
            <input name="password" type="password" />
        </div>
        <input type="submit"/>
    </form>
@endsection
