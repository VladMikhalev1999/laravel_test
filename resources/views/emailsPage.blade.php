@extends('template')


@section('title')
    {{ $login }}
@endsection

@section('emailtable')

<h1 style="text-align:center">Все электронные почты пользователя {{ $login }}</h1>
<table class="table table-striped table-hover mx-auto" style="width: 75%">
    <thead>
    <tr>
        <th scope="col">ИД</th>
        <th scope="col">Электронная почта</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
        @foreach($dict as $item)
            <tr>
                <td>{{ explode(':', $item)[0] }}</td>
                <td>{{ explode(':', $item)[1] }}</td>
                <td><a class="btn btn-primary" href="{{ route('emailchange', [$login, explode(':', $item)[0]]) }}">Изменить</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
