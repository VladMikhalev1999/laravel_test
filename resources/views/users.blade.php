@extends('template')


@section('title')
    Все пользователи
@endsection

@section('utable')

<h1 style="text-align:center">Все пользователи</h1>
<p><a href="{{ route('changepwd') }}" class="btn btn-primary">Изменить пароль</a></p>
<table class="table table-striped table-hover mx-auto", style="width: 75%">
    <thead>
    <tr>
        <th scope="col">Логин</th>
        <th scope="col">Хеш пароля</th>
        <th scope="col">Электронная почта</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->login }}</td>
                <td>{{ $user->password }}</td>
                <td><a class="btn btn-info" href="{{ route('emails', $user->login) }}">Подробнее</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
