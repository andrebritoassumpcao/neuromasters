<?php

namespace App\Exceptions;

use Exception;

class UserAlreadyExistsException extends Exception
{
    public function __construct(string $email, int $code = 0, Exception $previous = null)
    {
        $message = "Um usuário com o email '{$email}' já existe.";
        parent::__construct($message, $code, $previous);
    }

    public function render($request)
    {
        return response()->json([
            'error' => 'user_already_exists',
            'message' => $this->getMessage(),
        ], 409);
    }
}
