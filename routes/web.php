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
Route::prefix('/tea-app')->group(function () {
    Route::get('/meus-beneficiarios', function () {
        return view('meus-beneficiarios');
    })->name('beneficiarios');

    Route::get('/meus-atendimentos', function () {
        return view('meus-atendimentos');
    })->name('atendimentos');

    Route::get('/meus-profissionais', function () {
        return view('meus-profissionais');
    })->name('profissionais');

    Route::get('/minhas-avaliacoes', function () {
        return view('minhas-avaliacoes');
    })->name('avaliacoes');
    Route::get('/minhas-indicacoes', function () {
        return view('minhas-indicacoes');
    })->name('indicacoes');
    Route::get('/estrategias-de-intervencao', function () {
        return view('estrategias-intervencao');
    })->name('intervencao');
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
