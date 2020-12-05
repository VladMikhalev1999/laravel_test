@extends('template')

@section('title')
    Авторизация
@endsection

@section('authForm')
<form action="{{ route('signinForm') }}" method="post">
    @csrf
    <h1>Авторизация</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Логин</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="login" aria-describedby="emailHelp" placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <a href="{{ route('login') }}" class="btn btn-dark">Зарегистрироваться</a>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>

@endsection
