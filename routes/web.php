<?php

use App\Http\Controllers\LoginController;
use App\Models\Auth;
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

Route::get('/home/allusers', function (Request $r) {
    if (!$r->cookie('login') && !$r->cookie('passwordHash')) {
        return redirect()->route('signin')->with('error', 'Вы не авторизованы!');
    }
    return view('users', ['users' => Auth::all()]);
})->name('allusers');

Route::get('/home/allusers/password/change', function (Request $r) {
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

Route::post('/home/allusers/password/change', [ChangePasswordController::class, 'changePasswordHandler'])->name('changepwdproc');
