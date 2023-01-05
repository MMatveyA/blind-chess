@extends('web.master')

@section('title', $post->title)

@section('main')
    {!! $post->body !!}

    <div class="row row-cols-2">
        <p class="alert alert-success">Лайк: {{ $post->like }}</p>
        <p class="alert alert-danger">Дизлайк: {{ $post->dislike }}</p>
    </div>

    {{--@auth
        <div class="row row-cols-2">
            <a class="btn btn-success" href="{{ route('post.show', ['post' => $post->id, 'like' => 1]) }}">Лайк</a>
            <a class="btn btn-danger" href="{{ route('post.show', ['post' => $post->id, 'like' => -1]) }}">Дизлайк</a>
        </div>
    @else
        <p class="alert alert-warning">Только авторизированные пользователи могут ставить отметки.</p>
    @endauth--}}
    <br>
    @auth
        @if(Auth::id() == $post->user->id)
            <div class="row row-cols-2">
                <a class="btn btn-success" href="{{ route('post.edit', ['post' => $post->id]) }}">Редактировать</a>
                <a class="btn btn-danger" href="{{ route('post.destroy', ['post' => $post->id]) }}">Удалить</a>
            </div>
        @endif
    @endauth

    <p>Коментарии:</p>
    @foreach($post->comments as $comment)
        <x-comment :comment="$comment" type="post"/>
    @endforeach

    @auth
        <form action="{{ route('comment.create') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user"/>
            <input type="hidden" value="{{ $post->id }}" name="post_id" id="post"/>
            <legend>Написать коментарий</legend>
            <hr>
            <div class="mb-3">
                <label class="form-label" for="body">Коментарий</label>
                <textarea name="body" id="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <br>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'body', {
                filebrowserUploadUrl: "{{ route('uploader') }}",
                filebrowserUploadMethod: 'form',
                language: 'ru',
            } );
        </script>
    @else
        <p class="alert alert-warning">Только авторизированные пользователи могут оставлять коментарий</p>
    @endauth
@endsection
