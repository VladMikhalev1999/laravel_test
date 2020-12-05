<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Auth;
use Illuminate\Http\Response;



class LoginController extends Controller
{
    public function loginHandler(LoginRequest $r) {
        $toggle = $r->input('remember');
        $data = Auth::all();
        $user = $data->where('login', '=', $r->input('login'));
        if ($user) {
            if ($user->first()->getAttribute('password') == md5($r->input('password'))) {
                return $this->setCookie($toggle, $r->input('login'), $r->input('password'));
            }
            return redirect()->route('signin')->with('error', 'Введён неверный пароль!');
        }
        return redirect()->route('signin')->with('error', 'Пользователя с таким логином не существует!');
    }
    private function setCookie($toggle, $lgn, $pwd, $minutes = 120) {
        $res = new Response(redirect()->route('home')->with('success', 'Вход выполнен успешно!'));
        if ($toggle == 'on') {
            $res->withCookie(cookie('login', $lgn, $minutes))
                ->withCookie(cookie('passwordHash', md5($pwd), $minutes));
        } else {
            $res->withCookie(cookie('login', $lgn, 5))
                ->withCookie(cookie('passwordHash', md5($pwd), 5));
        }
        return $res;
    }

    public function logout() {
        $resp = new Response(redirect()->route('signin'));
        $resp->withCookie(cookie('login', null, 0))
            ->withCookie(cookie('passwordHash', null, 0));
        return $resp;
    }
}
