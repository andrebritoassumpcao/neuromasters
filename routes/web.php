<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/servicos', function () {
    return view('servicos');
});
Route::get('/entrar', function () {
    return view('entrar');
});

Route::get('/cadastro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/set-menu-option/{option}', [AuthController::class, 'setMenuOption'])->name('set_menu_option');

Route::get('/home', function () {
    return view('home');
});



