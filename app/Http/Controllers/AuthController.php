<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Auth;
use App\Models\Email;

class AuthController extends Controller
{
    public function authHandler(AuthRequest $r) {
        $user = Auth::all()->where('login', '=', $r->input('login'))->first();
        if ($user != null) {
            return redirect()->route('login')->with('error', 'Пользователь с таким логином уже существует!');
        }
        if (Email::all()->where('email', '=', $r->input('email'))->first() != null) {
            return redirect()->route('login')->with('error', 'Пользователь с такой электронной почтой уже существует!');
        }
        $a = new Auth();
        $a->login = $r->input('login');
        $a->password = md5($r->input("password"));
        $a->save();

        $e = new Email();
        $e->login = $r->input('login');
        $e->email = $r->input('email');
        $e->save();

        return redirect()->route('signin')->with('success', 'Регистрация прошла успешно!');
    }
}
