@extends('web.master')

@section('title', 'Вход')

@section('main')
    <form class="form-sign" action="{{ route('auth.login') }}" method="POST">
        <h1>ВХОД</h1>

        <input type="email" placeholder="Email" />
        <br>

        <input type="password" placeholder="Пароль" />
        <br>

        <input type="submit" value="Войти">

        <p>Ещё не зарегистрированы? <a href="{{ route('auth.register') }}">Регистрация</a></p>
    </form>
@endsection
