<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Auth;
use Illuminate\Support\Facades\DB;


class ChangePasswordController extends Controller
{
    public function changePasswordHandler(ChangePasswordRequest $r) {
        $lgn = $r->input('login');
        $old = $r->input('oldpwd');
        $new = $r->input('newpwd');
        $users = Auth::all();
        $user = $users->where('login', '=', $lgn);
        if ($user[0]->getAttribute('password') == md5($old)) {
            DB::table('auths')->where('login', '=', $lgn)->update(['password' => md5($new)]);
            return redirect()->route('allusers')->with('success', 'Пароль успешно изменен!');
        }
        return redirect()->route('changepwd')->with('error', 'Старый пароль указан неверно!');
    }
}
