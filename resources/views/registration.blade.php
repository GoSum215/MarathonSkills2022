@extends('layouts.app')

@section('title')
    Регистрация
@endsection

@section('link_style')
    {{--<link rel="stylesheet" href="{{ asset('../css/home_page.css') }}" />
    <link rel="stylesheet" href="{{ asset('../css/home_page_mobile.css') }}" media="(min-width:200px) and (max-width:768px)" />--}}
@endsection

@section('content')
    <h2>Регистрация</h2>

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    <form method="POST" action="{{ route('registration') }}" class="bordered">
        @csrf
        <div>
            <label>Login</label>
            <input name="login" type="text" value="{{ old('login') }}"/>
        </div>
        <div>
            <label>Password</label>
            <input name="password" type="password" />
        </div>
        <div>
            <label>Surname</label>
            <input name="surname" type="text" value="{{ old('surname') }}"/>
        </div>
        <div>
            <label>Name</label>
            <input name="name" type="text" value="{{ old('name') }}"/>
        </div>
        <div>
            <label>Gender</label>
            <select name="gender">
                <option value=0 {{ old('gender') === 0 ? 'selected="selected"' : '' }}>Male</option>
                <option value=1 {{ old('gender') === 1 ? 'selected="selected"' : '' }}>Female</option>
            </select>
        </div>
        <div>
            <label>E-mail</label>
            <input name="email" type="text" value="{{ old('email') }}"/>
        </div>
        <input type="submit" />
    </form>
@endsection
