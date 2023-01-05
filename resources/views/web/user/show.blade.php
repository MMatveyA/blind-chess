@extends('web.master')

@section('title', $user->name)

@section('main')
    <h2>Имя: {{ $user->name }}</h2>
    <p>Последний активность: {{ $user->updated_at }}</p>

    <h4>Коментарии пользователя:</h4>
    @foreach ($user->comments as $comment)
        <x-comment :comment="$comment" type="user"/>
    @endforeach
@endsection
