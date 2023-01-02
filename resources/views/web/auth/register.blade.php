@extends('web.master')

@section('title', 'Вход')

@section('main')
    <form class="form-sign" action="{{ route('auth.login') }}" method="POST">
        <h1>РЕГИСТРАЦИЯ</h1>

        <input type="text" placeholder="Имя пользователя" />
        <br>

        <input type="email" placeholder="Email" />
        <br>

        <input type="password" placeholder="Пароль" />
        <br>

        <input type="submit" value="Войти">

        <p>Уже зарегистрированы? <a href="{{ route('auth.login') }}">Войти</a></p>
    </form>
@endsection
