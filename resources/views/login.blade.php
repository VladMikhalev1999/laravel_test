@extends('template')

@section('title')
    Авторизация
@endsection

@section('loginForm')
<form class="mx-auto mt-5" action="{{ route('loginForm') }}" method="post">
    @csrf
    <h1>Регистрация</h1>
    <div class="form-group">
        <label for="exampleInputEmail1">Логин</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="login" aria-describedby="emailHelp" placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="sss">Электронная почта</label>
        <input type="email" class="form-control" id="sss" name="email" aria-describedby="emailHelp" placeholder="Введите электронную почту">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Пароль</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword2">Повтор пароля</label>
        <input type="password" class="form-control" name="repassword" id="exampleInputPassword2" placeholder="Повторите пароль">
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>

@endsection
