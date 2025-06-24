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
            $this->loginService->validateLoginData($request->all());

            $this->loginService->authenticate($request->input('email'), $request->input('password'));

            return redirect()->intended('home');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            Alert::error('Erro de Validação', implode($errors));

            return redirect()->route('login.index')->withInput();
        } catch (Exception $e) {
            Alert::error('Erro', $e->getMessage());

            return redirect()->route('login.index')->withInput();
        }
    }

    public function destroy()
    {
        $this->loginService->logout();

        return redirect()->route('login.index');
    }
}
