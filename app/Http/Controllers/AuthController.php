<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    public function showRegisterForm()
    {
        // Obtém a opção do menu ativa da sessão, ou define um valor padrão (por exemplo, 0).
        $activeMenu = session('active_menu', 0);

        // Outras lógicas necessárias...

        return view('registro', compact('activeMenu'));
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
            'senha' => $request->input('senha'),
            'telefone' => $request->input('telefone'),
        ]);

        // Autenticação do novo usuário
        Auth::login($user);

        // // Envio do e-mail de confirmação
        // Mail::to($user->email)->send(new ConfirmationEmail());

        // Redirecionamento
        return redirect()->intended('home');
    }

    public function login(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required|min:8',
        ]);

        // Autenticação
        $credentials = $request->only('email', 'senha');
        if (Auth::attempt($credentials)) {
            // Se a autenticação for bem-sucedida, redirecione para a página desejada
            return redirect()->intended('home');
        }

        // Se a autenticação falhar, redirecione de volta com uma mensagem de erro
        return redirect()->back()->withErrors(['login' => 'Credenciais inválidas.']);
    }
}
