@extends('layouts.app')

@section('title')
    Регистрация бегуна
@endsection

@section('link_style')
    <link href="{{ asset('../css/runner_registration.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" media="(min-width:200px) and (max-width:768px)" href="{{ asset('../css/runner_registration_mobile.css') }}" />
@endsection

@section('content')
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main_div all">
        <h1>Первый раз учавствуете?</h1>
        <h4>Заполните необходимые поля</h4>
        <form method="POST" action="{{ route('runner_reg') }}" class="bordered form1">
        @csrf
            <div class="inp">
                <div>
                    <label>Страна</label>
                    <input name="country" type="text" value="{{ old('country') }}">
                </div>
                <div>
                    <label>Дата рождения</label>
                    <input name="date_of_birthday" type="date" max="2012-12-21" min="1901-01-01" value="{{ old('date_of_birthday') }}">
                </div>
                <div class="gender">
                    <label>Пол</label>
                    <select name="gender">
                        <option value=0 {{ old('gender') === 0 ? 'selected="selected"' : '' }}>Мужской</option>
                        <option value=1 {{ old('gender') === 1 ? 'selected="selected"' : '' }}>Женский</option>
                    </select>
                </div>
            </div>
            <div class="subs1"><input type="submit" value="Далее"></div>
        </form>
    </div>
@endsection
