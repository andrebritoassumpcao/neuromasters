<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function index()
    {
        return view('responsavel.login.index');
    }

    public function store(Request $request)
    {
        try {
            // Chamar o serviço para validar os dados
            $this->loginService->validateLoginData($request->all());

            // Autenticar o usuário
            $this->loginService->authenticate($request->input('email'), $request->input('password'));

            // Redirecionar para a home se bem-sucedido
            return redirect()->intended('home');
        } catch (ValidationException $e) {
            // Exibir os erros de validação no alert
            $errors = $e->validator->errors()->all();
            Alert::error('Erro de Validação', implode($errors));

            return redirect()->route('login.index')->withInput();
        } catch (Exception $e) {
            // Exibir o erro de autenticação no alert
            Alert::error('Erro', $e->getMessage());

            return redirect()->route('login.index')->withInput();
        }
    }

    public function destroy()
    {
        // Chamar o serviço para deslogar o usuário
        $this->loginService->logout();

        return redirect()->route('login.index');
    }
}
