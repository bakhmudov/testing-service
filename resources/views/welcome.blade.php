<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="background-image"></div>
    <div class="overlay"></div>
    <div class="content welcome-text">
        <div class="title m-b-md">
            {{ config('app.name', 'Laravel') }}
        </div>

        <div class="links">
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Зарегистрироваться</a>
        </div>
    </div>
</div>
</body>
</html>
