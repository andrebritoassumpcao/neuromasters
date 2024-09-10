<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Exceptions\UserAlreadyExistsException;

use Exception;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    // Método para registrar o usuário
    public function register(UserDTO $userDTO)
    {

        // Validar os dados do usuário
        $this->validateUser($userDTO);

        // Realizar validações personalizadas
        $this->customValidations($userDTO);


        if ($this->userRepository->findByEmail($userDTO->email)) {
            throw new UserAlreadyExistsException($userDTO->email);
        }
        // Criar o usuário
        $user = $this->userRepository->create([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => Hash::make($userDTO->password),
            'celular' => $userDTO->celular,
        ]);

        // Logar o usuário após o registro
        Auth::login($user);

        return $user;
    }

    // Método para validar os dados de registro do usuário
    private function validateUser(UserDTO $userDTO)
    {
        $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O nome deve ter apenas letras.',
            'name.max' => 'O nome não pode ter mais de :max caracteres.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.string' => 'O e-mail deve ser uma string.',
            'email.email' => 'Por favor, forneça um endereço de e-mail válido.',
            'email.max' => 'O e-mail não pode ter mais de :max caracteres.',
            'email.unique' => 'Este e-mail já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'A senha deve ser uma string.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'celular.string' => 'O celular deve ser uma string.',
            'celular.min' => 'O celular deve ter pelo menos :min caracteres.',
            'celular.max' => 'O celular não pode ter mais de :max caracteres.',
        ];

        $validator = Validator::make((array) $userDTO, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'celular' => 'nullable|string|min:10|max:15',
        ], $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // Método para validações personalizadas
    private function customValidations(UserDTO $userDTO)
    {
        // Verificar se o nome contém apenas letras e espaços
        if (!preg_match("/^[a-zA-Z ]+$/", $userDTO->name)) {
            throw new Exception('O nome deve conter apenas letras e espaços.');
        }

        // Verificar se o email pertence ao domínio específico
        if (!str_ends_with($userDTO->email, '@exemplo.com')) {
            throw new Exception('O email deve pertencer ao domínio @exemplo.com.');
        }

        // Verificar se o celular começa com +55
        if ($userDTO->celular && !str_starts_with($userDTO->celular, '+55')) {
            throw new Exception('O número de celular deve começar com +55 (código do Brasil).');
        }
    }
}
