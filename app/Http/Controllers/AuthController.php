<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfissionalUser;
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

    session(['tipoUsuario' => $tipoUsuario]);

    return view('profissionais-views.welcome', compact('tipoUsuario'));
    }

    public function showRegisterForm($tipoUsuario = 'cliente'){
   // Obtém o tipo de usuário da sessão, ou define um valor padrão (por exemplo, 'cliente').
   $tipoUsuario = session('tipoUsuario', 'cliente');

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
            'celular' => $request->input('celular'),
        ]);

        // Autenticação do novo usuário
        Auth::login($user);

        Alert::alert('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar', 'Type');
        return redirect()->intended('login');
    }

    public function registerProfissional(Request $request)
    {
        // Obter o número total de usuários profissionais já registrados
        $totalUsers = ProfissionalUser::count();

        // Gerar o codigo_profissional
        $codigo_profissional = date('Y') . date('m') . str_pad($totalUsers + 1, 3, '0', STR_PAD_LEFT);

        // Criação do novo usuário profissional
        $user = ProfissionalUser::create([
            'codigo_profissional' => $codigo_profissional,
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'celular' => $request->input('celular'),
            'conselho_regional' => $request->input('conselho_regional'),
            'numero_conselho' => $request->input('numero_conselho'),
            'especialidade' => $request->input('especialidade'),
            'resumo_profissional' => $request->input('resumo_profissional'),
        ]);




        // Autenticação do novo usuário
        Auth::login($user);

        Alert::alert('Parabéns!', 'Seu registro foi concluído com sucesso. Faça o login para começar', 'Type');
        return redirect()->intended('profissionais-views/loginProfissionais');    }

}
