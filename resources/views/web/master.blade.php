<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | Шахамты для слепых</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
</head>
<body>
    @include('web.layouts.header')
    <main>
        @yield('main')
    </main>
    @yield('web.layouts.footer')
</body>
</html>
