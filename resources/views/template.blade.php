<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
@if(!Route::is('signin') && !Route::is('login'))
    <a href="{{ route('logout') }}" class="btn btn-danger">Выйти</a>
@endif

@if(session('userdata'))
    <div style="float:right">
        @foreach(session('userdata') as $data)
            <p>{{ $data }}</p>
        @endforeach
    </div>
@endif

@if(Route::is('allusers'))
    <a class="btn btn-secondary" href="{{ route('home') }}">Назад</a>
@endif

@if(Route::is('changepwd'))
    <a class="btn btn-secondary" href="{{ route('allusers') }}">Назад</a>
@endif

@if($errors->any() || session('success') || session('error'))

<div class="container mt-5">
    @include('messages')
</div>

@endif

@if(Route::is('signin'))
    @yield('authForm')
@endif

@if(Route::is('login'))
    @yield('loginForm')
@endif

@if(Route::is('home') || Route::is('changepwd'))
    @yield('body')
@endif

@if(Route::is('allusers'))
    @yield('utable')
@endif

</body>
</html>
