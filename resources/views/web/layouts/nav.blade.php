<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Главная</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        @if (Auth::user()->superuser)
                            <li class="nav-item"><a class="nav-link active" href="{{ route('post.create') }}">Создать пост</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link active" href="{{ route('auth.logout') }}">Выйти</a></li>
                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link active" href="{{ route('auth.login') }}">Войти</a></li>
                    @endguest
                    {{--<li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">About</a></li>--}}
            </ul>
        </div>
    </div>
</nav>
