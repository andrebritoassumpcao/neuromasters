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
        return view('profissionais-views.welcome', compact('tipoUsuario'));
    }

    public function showRegisterForm($tipoUsuario = 'cliente')
    {
        $tipoUsuario = session('tipoUsuario', 'cliente');
        $activeMenu = session('active_menu', 0);
        return view('registro', compact('activeMenu', 'tipoUsuario'));
    }

    public function setMenuOption($option)
    {
        session(['active_menu' => (int) $option]);
        return redirect()->route('registro');
    }

    public function register(Request $request)
    {
        try {
            // Criar o DTO com os dados do request
            $userDTO = new UserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password'),
                $request->input('celular')
            );

            // Chamar o serviço para registrar o usuário
            $this->authService->register($userDTO);

            // Exibir mensagem de sucesso usando SweetAlert2
            Alert::success('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar.');
            return redirect()->intended('home');
        } catch (ValidationException $e) {
            // Exibir erros de validação no SweetAlert2
            $errors = $e->validator->errors()->all();
            Alert::error('Erro de Validação', implode('<br>', $errors));
            return redirect()->back()->withInput();
        } catch (UserAlreadyExistsException $e) {
            Alert::error('Erro', $e->getMessage());
            return redirect()->back()->withInput();
        } catch (Exception $e) {
            // Exibir outros erros no SweetAlert2
            Alert::error('Erro', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
