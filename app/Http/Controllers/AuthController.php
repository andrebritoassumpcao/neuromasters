<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Services\AuthService;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use App\Exceptions\UserAlreadyExistsException;

use Exception;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showWelcomeForProfessionals()
    {
        $tipoUsuario = 'profissional';
        session(['tipoUsuario' => $tipoUsuario]);
        return view('profissional.welcome.index', compact('tipoUsuario'));
    }

    public function showRegisterForm($tipoUsuario = 'cliente')
    {
        $tipoUsuario = session('tipoUsuario', 'cliente');
        $activeMenu = session('active_menu', 0);
        return view('responsavel.register.index', compact('activeMenu', 'tipoUsuario'));
    }

    public function setMenuOption($option)
    {
        session(['active_menu' => (int) $option]);
        return redirect()->route('registro');
    }

    public function register(Request $request)
    {
        try {
            $userDTO = new UserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password'),
                $request->input('celular'),
                $request->input('password_confirmation')

            );

            $this->authService->register($userDTO);

            Alert::success('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar.');
            return redirect()->intended('home');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            Alert::error('Erro de Validação', implode('<br>', $errors));
            return redirect()->back()->withInput();
        }
    }
}
