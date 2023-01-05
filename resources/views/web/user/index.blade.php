@extends('web.master')

@section('title', 'Пользователи')

@section('main')
    <div class="row">
    @foreach ($users as $user)
        <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-text">{{ $user->name }}</h5>
                <a class="btn btn-primary" href="{{ route('users.show', ['user' => $user->id]) }}">Подробнее</a>
            </div>
        </div>
        </div>
    @endforeach
    </div>
@endsection
