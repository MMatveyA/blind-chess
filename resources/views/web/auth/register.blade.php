@extends('web.master')

@section('title', 'Вход')

@section('main')
    <div class="row">
        <div class="w-50 mx-auto">
            <form class="needs-validation" action="{{ route('auth.register') }}" method="POST">
                @csrf
                <legend>РЕГИСТРАЦИЯ</legend>

                    <label class="form-label" for="name">Имя пользователя</label>
                    <input type="text" id="name" name="name" placeholder="Имя пользователя" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="email">Адрес электронной почты (email)</label>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label class="form-label" for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Пароль" class="form-control @error('password') is-invalid @enderror" />
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember_token" checked>
                    <label class="form-check-label" for="remember">Запомнить меня</label>
                </div>

                <button class="btn btn-primary" type="submit">Войти</button>

                <p>Уже зарегистрированы? <a href="{{ route('auth.login') }}">Войти</a></p>
            </form>
        </div>
    </div>
@endsection
