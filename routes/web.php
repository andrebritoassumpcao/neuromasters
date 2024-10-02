<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginProfController;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BuscarCepController;
use App\Http\Controllers\CadastrarBenefController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\ProfissionalController;



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
    return view('responsavel.welcome.index', compact('tipoUsuario'));
});

Route::get('/servicos', function () {
    return view('responsavel.servicos.index');
});
Route::get('/tea-app', function () {
    return view('tea.home.index');
});
Route::get('/teaPro-app', function () {
    return view('profissional.tea.home.index');
});
Route::get('/home', function () {
    return view('responsavel.home.index');
});

Route::get('/profisisonais', [ProfissionaisController::class, 'index'])->name('profissionais');


Route::get('/sou-profissional', [AuthController::class, 'showWelcomeForProfessionals']);

Route::controller(ProfissionalController::class)->group(function () {
    Route::post('/Registro-profissional', 'registerProfissional')->name('registerProfissional');
    Route::get('/Perfil-profissional/{id_profissional}', 'mostrarPerfil')->name('profissionalPerfil.index');
    Route::get('/visualizar-perfil/{id_profissional}', 'verPerfil')->name('profissionalVerPerfil.index');
    Route::post('/Perfil-profissional/{id_profissional}', 'uploadFotoPerfil')->name('profissionalPerfil.upload');
    Route::put('/Editar-profissional/{id_profissional}', 'updateProfissional')->name('profissionalPerfil.update');
    Route::put('/Editar-profissional/{id_profissional}/updateSobre', 'updateSobreProfissional')->name('profissionalPerfil.updateSobre');
    Route::post('/Editar-profissional/{id_profissional}/createFormacao', 'createFormacao')->name('profissionalPerfil.createFormacao');
    Route::put('/Editar-profissional/{formacao_id}/updateFormacao', 'updateFormacao')->name('profissionalPerfil.updateFormacao');
    Route::get('/Editar-profissional/{id_profissional}/deleteFormacao', 'deleteFormacao')->name('profissionalPerfil.deleteFormacao');
    Route::get('/Formacao-profissional/{id_profissional}', 'showFormacoes')->name('profissionalPerfil.showFormacoes');
    Route::put('/Editar-profissional/{id_profissional}/competencias', 'updateCompetencias')->name('profissionalPerfil.updateCompetencias');
    Route::delete('/Editar-profissional/{id_profissional}/deleteCompetencias', 'deleteCompetencias')->name('profissionalPerfil.deleteCompetencias');
});


Route::prefix('/tea-app')->group(function () {
    Route::controller(CadastrarBenefController::class)->group(function () {
        Route::get('/meus-meneficiarios', 'index')->name('beneficiarios.index');
        Route::post('/cadastrar-beneficiario', 'registerBeneficiario')->name('beneficiarios.register');
        Route::get('/meu-beneficiario/{id_beneficiario}', 'mostrarBeneficiario')->name('beneficiarios.mostrar');
        Route::post('/meu-beneficiario/{id_beneficiario}', 'uploadFoto')->name('beneficiarios.upload');
    });
    Route::get('/cadastrar-beneficiario', function () {
        return view('tea.register.index');
    })->name('cadastrar-beneficiario');

    Route::get('/meus-atendimentos', function () {
        return view('tea.atendimentos.index');
    })->name('atendimentos');

    Route::get('/meus-profissionais', function () {
        return view('tea.profissionais.index');
    })->name('profissional');

    Route::get('/minhas-avaliacoes', function () {
        return view('tea.avaliacoes.index');
    })->name('avaliacoes');
    Route::get('/minhas-indicacoes', function () {
        return view('tea.indicacoes.index');
    })->name('indicacoes');
    Route::get('/estrategias-de-intervencao', function () {
        return view('tea.estrategias-intervencao.index');
    })->name('intervencao');
});




Route::get('/cadastro/{tipoUsuario?}', [AuthController::class, 'showRegisterForm'])->name('registro');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/set-menu-option/{option}', [AuthController::class, 'setMenuOption'])->name('set_menu_option');


Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::get('/logout', 'destroy')->name('login.destroy');
});


Route::get('/profissional/loginProfissionais', [LoginProfController::class, 'index'])->name('loginProfissionais.index');
Route::post('/profissional/loginProfissionais', [LoginProfController::class, 'store'])->name('loginProfissionais.store');
Route::get('/profissional/logoutProfissionais', [LoginProfController::class, 'destroy'])->name('loginProfissionais.destroy');
