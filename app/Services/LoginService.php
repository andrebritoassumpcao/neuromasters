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

    public function validateLoginData(array $data): void
    {
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'O campo de email é obrigatório!',
            'email.email' => 'O email digitado é inválido!',
            'password.required' => 'O campo de senha é obrigatório',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function authenticate(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            throw new Exception('Email ou senha inválida.');
        }

        if (!Hash::check($password, $user->password)) {
            throw new Exception('Senha inválida.');
        }

        Auth::loginUsingId($user->id);

        return true;
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
