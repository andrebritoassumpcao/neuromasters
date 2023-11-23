<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        session(['active_menu' => (int)$option]);

        // Redireciona de volta à página de registro.
        return redirect()->route('registro');
    }

    // public function authenticate(Request $request)
    // {

    //     $credentials = $request->only('nome','email', 'password', 'telefone');
    //     dd($credentials);

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('home');
    //     } else {
    //         return back()->withErrors(['message' => 'Credenciais inválidas']);
    //     }
    // }
    // AuthController.php

public function register(Request $request)
{
    // Recupere os dados do formulário
    $name = $request->input('nome_hidden');
    $email = $request->input('email_hidden');
    $telefone = $request->input('telefone_hidden');
    $senha = $request->input('senha_hidden');
    $confirmaSenha = $request->input('confirmaSenha_hidden');

    // Realize o processamento necessário (por exemplo, salvar no banco de dados)

    // Continue com o redirecionamento ou resposta apropriada
    return redirect()->intended('home');
}


}
