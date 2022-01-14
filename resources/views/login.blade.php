@extends('layouts.app')

@section('title')
    Войти
@endsection

@section('link_style')
    <link href="{{ asset('../css/login.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/login_mobile.css') }}" />
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
    <div class="main_div all">
        <div class="name_block">
            <h1>Вход</h1>
        </div>
        <form class="form_block" method="POST" action="{{ route('login') }}" name="add_new_marathon">
            @csrf
            <div class="data_div">
                <div>
                    <label>Логин</label>
                    <input name="login" type="text" value="{{ old('login') }}" size="25"/>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input type="password" name="password" size="25">
                </div>
            </div>
            <div class="sub"><input type="submit" value="Войти"></div>
        </form>
    </div>
@endsection
