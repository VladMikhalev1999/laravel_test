@extends('template')

@section('title')
    Авторизация
@endsection

@section('authForm')
<form  class="mx-auto mt-5" action="{{ route('signinForm') }}" method="post">
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
    <div class="form-group mx-auto" style="width: 150px">
        <input class="form-check-input" name="remember" type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Запомнить пароль</label>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
    <a id="lolkek" href="{{ route('login') }}" class="btn btn-dark">Зарегистрироваться</a>
</form>

@endsection
