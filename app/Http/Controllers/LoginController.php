<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
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

        $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        return redirect()->route('login.index')->withErrors(['error' => 'Email or password invalid']);
      }

      if (!password_verify($request->input('password'), $user->password)) {
        return redirect()->route('login.index')->withErrors(['error' => ' password invalid']);
      }
      Auth::loginUsingId($user->id);

      return redirect()->intended('home');

    }
    public function destroy()
  {
    Auth::logout();

    return redirect()->route('login.index');
  }

}
