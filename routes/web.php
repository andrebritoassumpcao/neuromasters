<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;



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

Route::get('/', function() {
    return view('welcome');
});
Route::get('/servicos', function () {
    return view('servicos');
});
Route::get('/tea-app', function () {
    return view('tea-app');
});


Route::get('/cadastro', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/set-menu-option/{option}', [AuthController::class, 'setMenuOption'])->name('set_menu_option');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::get('/logout','destroy')->name('login.destroy');
});

Route::get('/home', function () {
    return view('home');
});




