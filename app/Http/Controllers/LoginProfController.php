<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProfissionalUser;


class LoginProfController extends Controller
{
    public function index()
    {
        return view('profissional.login.index');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo de email é obrigatório!',
            'email.email' => 'O email digitado é inválido!',
            'password.required' => 'O campo de senha é obrigatório',
        ]);

        $user = ProfissionalUser::where('email', $request->input('email'))->first();
        if (!$user) {
            return redirect()->route('loginProfissionais.index')->withErrors(['error' => 'Email ou senha inválida']);
        }

        if (!password_verify($request->input('password'), $user->password)) {
            return redirect()->route('loginProfissionais.index')->withErrors(['error' => ' Senha inválida']);
        }
        Auth::guard('profissional')->login($user);
        session(['user' => $user]);

        return redirect()->intended('/teaPro-app');
    }

    public function destroy()
    {
        Auth::guard('profissional')->logout();

        return redirect()->route('loginProfissionais.index');
    }
}
