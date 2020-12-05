@extends('template')

@section('title')
    Домашняя
@endsection

@section('body')
    <h1>Добро пожаловать!</h1>
    <a href="{{ route('allusers') }}" class="btn btn-info">Все пользователи</a>
@endsection
