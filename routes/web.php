<?php

use App\Http\Controllers\ChangeEmailController;
use App\Http\Controllers\LoginController;
use App\Models\Auth;
use App\Models\Email;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\ChangePasswordController;
use Symfony\Component\HttpFoundation\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (Request $r) {
    if ($r->cookie('login') && $r->cookie('passwordHash')) {
        return redirect()->route('home')->with('userdata', [$r->cookie('login'), $r->cookie('passwordHash')]);
    }
    return view('signin');
})->name('signin');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home/users', function (Request $r) {
    if (!$r->cookie('login') && !$r->cookie('passwordHash')) {
        return redirect()->route('signin')->with('error', 'Вы не авторизованы!');
    }
    return view('users', ['users' => Auth::all()]);
})->name('allusers');

Route::get('/home/users/password/change', function (Request $r) {
    if (!$r->cookie('login') && !$r->cookie('passwordHash')) {
        return redirect()->route('signin')->with('error', 'Вы не авторизованы!');
    }
    return view('chngpwd', ['users' => Auth::all()]);
})->name('changepwd');

Route::get('/login', function (Request $r) {
    if ($r->cookie('login') && $r->cookie('passwordHash')) {
        return redirect()->route('home')->with('success', 'Вы уже авторизованы!');
    }
    return view('login');
})->name('login');

Route::post('/auth', [AuthController::class, 'authHandler'])->name('loginForm');

Route::post('/signin', [LoginController::class, 'loginHandler'])->name('signinForm');

Route::get("/home", function(Request $r) {
    if (!$r->cookie('login') && !$r->cookie('passwordHash')) {
        return redirect()->route('signin')->with('error', 'Вы не авторизованы!');
    }
    return view('main');
})->name('home');

Route::post('/home/users/password/change', [ChangePasswordController::class, 'changePasswordHandler'])->name('changepwdproc');

Route::get('/home/users/{login}/emails', function($login) {
    $arr = Email::all()->where('login', '=', $login)->all();
    $dict = [];
    foreach($arr as $item) {
        $id = $item->getAttribute('id');
        $email = $item->getAttribute('email');
        $field = $id . ':' . $email;
        array_push($dict, $field);
    }
    return view('emailsPage', ['login' => $login, 'dict' => $dict]);
})->name('emails');

Route::get('/home/users/{login}/emails/{id}/change', function($login, $id) {
    $field = Email::all()->find($id);
    return view('changeEmailForm', ['data' => $field]);
})->name('emailchange');

Route::post('/home/users/{login}/emails/{id}/change', [ChangeEmailController::class, 'changeEmailHandler'])->name('emailChangeHandling');
