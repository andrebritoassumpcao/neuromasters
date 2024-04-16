<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;




class AuthController extends Controller
{

    public function showWelcomeForProfessionals()
    {
    // Defina o tipo de usuário como profissional
    $tipoUsuario = 'profissional';

    // Passa as variáveis para a view
    return view('profissionais-views.welcome', compact('tipoUsuario'));
    }

    public function showRegisterForm()
{
    // Defina o tipo de usuário com base na rota atual
    $tipoUsuario = request()->is('sou-profissional') ? 'profissional' : 'cliente';
    var_dump($tipoUsuario);
    // Obtém a opção do menu ativa da sessão, ou define um valor padrão (por exemplo, 0).
    $activeMenu = session('active_menu', 0);

    // Passa as variáveis para a view
    return view('registro', compact('activeMenu', 'tipoUsuario'));
}


    public function setMenuOption($option)
    {
        \Log::info('Menu Option: ' . $option);
        // Define a opção do menu na sessão.
        session(['active_menu' => (int) $option]);

        // Redireciona de volta à página de registro.
        return redirect()->route('registro');
    }

    public function register(Request $request)
    {
        // Criação do novo usuário
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'telefone' => $request->input('telefone'),
        ]);

        // Autenticação do novo usuário
        Auth::login($user);

        Alert::alert('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar', 'Type');
        return redirect()->intended('login');
    }

}
