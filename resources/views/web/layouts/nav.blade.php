<ul class="nav">
    <li class="nav-item nav-item-left"><a href="{{ route('home') }}">Главная</a></li>
    <li class="nav-item nav-item-right"><a href="{{ route('about') }}">About</a></li>
    
    @guest
        <li class="nav-item nav-item-right"><a href="{{ route('auth.login') }}">Войти</a></li>
    @endguest

    @auth
        <li class="nav-item nav-item-right"><a href="{{ route('auth.logout') }}">Выйти</a></li>
    @endauth
</ul>
