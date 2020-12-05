@extends('template')


@section('title')
    Все пользователи
@endsection

@section('utable')
<h1>Все пользователи</h1>
<p><a href="{{ route('changepwd') }}" class="btn btn-primary">Изменить пароль</a></p>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">Логин</th>
        <th scope="col">Хеш пароля</th>
    </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->login }}</td>
                <td>{{ $user->password }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
