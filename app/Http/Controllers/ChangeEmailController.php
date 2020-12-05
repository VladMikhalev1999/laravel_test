<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailRequest;
use App\Models\Auth;
use App\Models\Email;

class ChangeEmailController extends Controller
{
    public function changeEmailHandler($lgn, $id, ChangeEmailRequest $r) {
        $email = Email::all()->find($id);
        $login = Auth::all()->where('login', '=', $lgn)->first();
        if ($login->getAttribute('password') == md5($r->input('pwd'))) {
            $email->email = $r->input('email');
            $email->save();
            return redirect()->route('emails', $lgn)->with('success', 'Электронная почта успешно изменена!');
        }
        return redirect()->route('emailchange', [$lgn, $id])->with('error', 'Неверный пароль!');
    }
}
