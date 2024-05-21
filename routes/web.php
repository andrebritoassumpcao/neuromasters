<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginProfController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BuscarCepController;
use App\Http\Controllers\CadastrarBenefController;



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
    $tipoUsuario = 'cliente';
    session(['tipoUsuario' => $tipoUsuario]);
    return view('welcome', compact('tipoUsuario'));
});
Route::get('/servicos', function () {
    return view('servicos');
});
Route::get('/tea-app', function () {
    return view('tea.tea-app');
});
Route::get('/sou-profissional', [AuthController::class, 'showWelcomeForProfessionals']);


Route::prefix('/tea-app')->group(function () {
    Route::controller(CadastrarBenefController::class)->group(function(){
        Route::get('/meus-meneficiarios','index')->name('beneficiarios.index');
        Route::post('/cadastrar-beneficiario','registerBeneficiario')->name('beneficiarios.register');
        Route::get('/meu-beneficiario/{id_beneficiario}','mostrarBeneficiario')->name('beneficiarios.mostrar');
        Route::post('/meu-beneficiario/{id_beneficiario}', 'uploadFoto')->name('beneficiarios.upload');
    });
    Route::get('/cadastrar-beneficiario', function () {
        return view('tea.cadastrar-beneficiario');
    })->name('cadastrar-beneficiario');

    Route::get('/meus-atendimentos', function () {
        return view('tea.meus-atendimentos');
    })->name('atendimentos');

    Route::get('/meus-profissionais', function () {
        return view('tea.meus-profissionais');
    })->name('profissionais');

    Route::get('/minhas-avaliacoes', function () {
        return view('tea.minhas-avaliacoes');
    })->name('avaliacoes');
    Route::get('/minhas-indicacoes', function () {
        return view('tea.minhas-indicacoes');
    })->name('indicacoes');
    Route::get('/estrategias-de-intervencao', function () {
        return view('tea.estrategias-intervencao');
    })->name('intervencao');
});




Route::get('/cadastro/{tipoUsuario?}', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/registerProfissional', [AuthController::class, 'registerProfissional'])->name('registerProfissional');
Route::get('/set-menu-option/{option}', [AuthController::class, 'setMenuOption'])->name('set_menu_option');


Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::get('/logout','destroy')->name('login.destroy');
});


Route::get('/profissionais-views/loginProfissionais', [LoginProfController::class, 'index'])->name('loginProfissionais.index');
Route::post('/profissionais-views/loginProfissionais', [LoginProfController::class, 'store'])->name('loginProfissionais.store');
Route::get('/profissionais-views/logoutProfissionais', [LoginProfController::class, 'destroy'])->name('loginProfissionais.destroy');
?>




