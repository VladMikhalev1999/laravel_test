@extends('template')

@section('title')
Сменить пароль
@endsection

@section('body')
<h1>Форма смены пароля!</h1>
<form action="{{ route('changepwdproc') }}" method="post">
    @csrf
    <div class="form-group">
        <select class="form-control" name='login'>
            @foreach($users as $user)
            <option>{{$user->login}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="old">Старый пароль</label>
        <input type="password" class="form-control" id="old" name="oldpwd" placeholder="Введите старый пароль">
    </div>
    <div class="form-group">
        <label for="new">Новый пароль</label>
        <input type="password" class="form-control" id="new" name="newpwd" placeholder="Введите новый пароль">
    </div>
    <button class="btn btn-primary" type="submit">Подтвердить</button>
</form>
@endsection
