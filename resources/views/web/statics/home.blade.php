@extends('web.master')

@section('title', 'Главная')

@section('main')
    <ul>
        <li><a href="{{ route('post.index') }}">Посты</a></li>
        <li><a href="{{ route('users.index') }}">Пользователи</a></li>
    </ul>
@endsection
