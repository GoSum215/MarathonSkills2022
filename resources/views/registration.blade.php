@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('link_style')
    <link href="{{ asset('../css/registration.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/registration_mobile.css') }}" />
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div class="main_div all">
        <div class="name_block">
            <h1>Регистрация</h1>
        </div>
        <form class="form_block" method="POST" action="{{ route('registration') }}" name="add_new_marathon">
            @csrf
            <div class="data_div">
                <div>
                    <label for="name">Имя:</label>
                    <input type="text" name="name" value="{{ old('name') }}" size="25">
                </div>
                <div>
                    <label for="surname">Фамилия:</label>
                    <input type="text" name="surname" value="{{ old('surname') }}" size="25">
                </div>
                <div>
                    <label for="email">E-mail:</label>
                    <input name="email" type="text" value="{{ old('email') }}" size="25"/>
                </div>
                <div>
                    <label>Логин</label>
                    <input name="login" type="text" value="{{ old('login') }}" size="25"/>
                </div>
                <div>
                    <label for="password">Пароль:</label>
                    <input type="password" name="password"  size="25">
                </div>
            </div>
            <div class="sub"><input type="submit" value="Зарегестрироваться"></div>
        </form>
    </div>
@endsection
