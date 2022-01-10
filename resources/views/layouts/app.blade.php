<!doctype html>
<html lang="en">
@inject('auth', '\Illuminate\Support\Facades\Auth')
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('../../css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../../css/app_mobile.css') }}" />
    @yield('link_style')
</head>
<body>
<header class="all_header">
    <a href="{{ route('welcome') }}">
        <img class="logo" src="{{ asset('../../images/logo.png') }}" alt="logo">
    </a>
    <div class="buttonSignInLogIn">
    @if ($auth::check())
            <a href="{{ route('logout') }}" class="buttonLogIn">Выйти</a>
            <a href="{{ route('profile') }}" class="buttonSignIn">Профиль</a>
        @else
            <a href="{{ route('login') }}" class="buttonLogIn">Войти</a>
            <a href="{{ route('registration') }}" class="buttonSignIn">Регистрация</a>
        @endif
{{--        <div class="buttonLogIn">Вход</div>
        <div class="buttonSignIn">Регистрация</div>--}}
    </div>
</header>
<div class="line_header"></div>

@yield('content')

<footer>
    <div class="footer_logo_line">
        <div class="line"></div>
        <img class="logo_footer" src="{{ asset('../../images/logo.png') }}" alt="logo">
        <div class="line"></div>
    </div>
    <div class="three_collums all" style="justify-content: space-around">
        <div class="download_app">
            <div>Попробуй наше приложение:</div>
            <img class="app" src="{{ asset('../../images/download.png') }}" alt="download">
        </div>
        <div class="soc_networks">
            <img class="socs" src="{{ asset('../../images/twitter.png') }}" alt="twitter">
            <img class="socs" src="{{ asset('../../images/instagram.png') }}" alt="instagram">
            <img class="socs" src="{{ asset('../../images/facebook.png') }}" alt="facebook">
        </div>
        <div class="contacts">
            <div class="row_footer">О проекте</div>
            <div class="row_footer">Контакты</div>
            <div class="row_footer">Конфидециальность</div>
        </div>
    </div>
    <div class="copywrite">© Marathon Skills 2021, Все права защищены</div>
</footer>
</body>
</html>
