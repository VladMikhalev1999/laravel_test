<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Auth;
class AuthController extends Controller
{
    public function authHandler(AuthRequest $r) {
        $user = Auth::all()->where('login', '=', $r->input('login'));
        if (!isset($user)) {
            return redirect()->route('signin')->with('error', 'Пользователь с таким логином уже существует!');
        }
        $a = new Auth();
        $a->login = $r->input('login');
        $a->password = md5($r->input("password"));
        $a->save();
        return redirect()->route('home')->with('success', 'Регистрация прошла успешно!');
    }
}
