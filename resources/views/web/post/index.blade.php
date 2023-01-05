@extends('web.master')

@section('title', 'Посты')

@section('main')
    <div class="row">
        @foreach($posts as $post)
            <div class="col">
                <div class="card" style="width:18rem">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $post->title }}</b></h4>
                        <h6 class="card-subtitle">Автор: {{ $post->user->name }}</h6>
                        <p class="card-text">{{ $post->introduction }}</p>
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{ route('post.show', ['post'=>$post->id]) }}">Читать</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
