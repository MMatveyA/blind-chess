@extends('web.master')

@section('title', 'Создание поста')

@section('main')
    <form action="{{ route('post.update', ['post' => $post->id]) }}" class="form-post" method="POST">
        <h2>Создание поста</h2>
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" placeholder="Название поста"><br>
        <input type="text" name="introduction" value="{{ $post->introduction }}" placeholder="Предисловие к посту"><br>
        <textarea id="body" name="body">{{ $post->body }}</textarea><br>
        <input type="submit" value="Обновить">
        <input type="reset" value="Сбросить">
    </form>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'body', {
            filebrowserUploadUrl: "{{ route('uploader') }}",
            filebrowserUploadMethod: 'form',
            language: 'ru',
        } );
    </script>
@endsection
