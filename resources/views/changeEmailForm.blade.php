@extends('template')

@section('title')
    Сменить пароль
@endsection

<a class="btn btn-secondary" href="{{ route('emails', $data->getAttribute('login'))  }}">Назад</a>
@section('body')
<h1 class="mt-5" style="text-align: center">Форма смены электронной почты</h1>
<form action="{{ route('emailChangeHandling', [ $data->getAttribute('login'),$data->getAttribute('id')]) }}" class="mx-auto" method="post">
    @csrf
    <div class="form-group">
        <label for="id">ИД</label>
        <input readonly class="form-control" id="id" type="number" name="id" value="{{ $data->getAttribute('id') }}">
    </div>
    <div class="form-group">
        <label for="login">Имя пользователя</label>
        <input readonly class="form-control" id="login" type="text" name="login" value="{{ $data->getAttribute('login') }}">
    </div>
    <div class="form-group">
        <label for="email">Электронная почта</label>
        <input type="email" class="form-control" value="{{ $data->getAttribute('email') }}" id="email" name="email" placeholder="Введите новый email">
    </div>
    <div class="form-group">
        <label for="confirm">Пароль</label>
        <input type="password" class="form-control" id="confirm" name="pwd" placeholder="Введите пароль для подтверждения">
    </div>
    <button class="btn btn-primary" type="submit">Подтвердить</button>
</form>
@endsection
