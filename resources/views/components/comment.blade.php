@if ($type == 'post')
    <div class="card">
        <div class="container">
            <div class="card-body">
                <p>
                <a href="{{ route('users.show', ['user' => $comment->user->id]) }}" target="_blank"><b>Автор: {{ $comment->user->name }}</b></a>
                </p>
                <p>{!! $comment->body !!}</p>
            </div>
        </div>
    </div>
@elseif ($type == 'user')
    <div class="card">
        <div class="container">
            <div class="card-body">
                <p>
                <a href="{{ route('post.show', ['post' => $comment->post->id]) }}" target="_blank"><b>Статья: {{ $comment->post->title }}</b></a>
                </p>
                <p>{!! $comment->body !!}</p>
            </div>
        </div>
    </div>
@endif
