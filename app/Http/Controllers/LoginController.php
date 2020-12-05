<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Auth;

class LoginController extends Controller
{
    public function loginHandler(LoginRequest $r) {
        $data = Auth::all();
        $user = $data->where('login', '=', $r->input('login'));
        if ($user) {
            if ($user[0]->getAttribute('password') == md5($r->input('password'))) {
                return redirect()->route('home')->with('success', 'Вход выполнен успешно!');
            }
            return redirect()->route('signin')->with('error', 'Введён неверный пароль!');
        }
        return redirect()->route('signin')->with('error', 'Пользователя с таким логином не существует!');
    }
}
