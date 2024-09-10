<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;

class LoginService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Método para validar os dados de login
    public function validateLoginData(array $data): void
    {
        // Validação dos dados de entrada
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo de email é obrigatório!',
            'email.email' => 'O email digitado é inválido!',
            'password.required' => 'O campo de senha é obrigatório',
        ]);

        // Se a validação falhar, lançar exceção
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // Método para autenticar o usuário
    public function authenticate(string $email, string $password): bool
    {
        // Buscar o usuário pelo email
        $user = $this->userRepository->findByEmail($email);

        // Verificar se o usuário existe
        if (!$user) {
            throw new Exception('Email ou senha inválida.');
        }

        // Verificar se a senha está correta
        if (!Hash::check($password, $user->password)) {
            throw new Exception('Senha inválida.');
        }

        // Logar o usuário
        Auth::loginUsingId($user->id);

        return true;
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
