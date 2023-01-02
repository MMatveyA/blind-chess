@extends('web.master')

@section('title', 'Вход')

@section('main')
    <form class="form-sign" action="{{ route('auth.register') }}" method="POST">
        @csrf
        <h1>РЕГИСТРАЦИЯ</h1>
        @if ($errors->any())
            <div class="danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <input type="text" name="name" placeholder="Имя пользователя" class="@error('name') is-invalid @enderror" />
        <br>

        <input type="email" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" />
        <br>

        <input type="password" name="password" placeholder="Пароль" class="@error('password') is-invalid @enderror" />
        <br>

        <div class="remember">
            <input type="checkbox" id="remeber" name="remeber" value="remeber">
            <label for="remember">Запомнить меня</label>
        </div>

        <input type="submit" value="Зарегистриоваться">

        <p>Уже зарегистрированы? <a href="{{ route('auth.login') }}">Войти</a></p>
    </form>
@endsection
