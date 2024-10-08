<?php

namespace App\DTO;

class UserDTO
{
    public $name;
    public $email;
    public $password;
    public $celular;
    public $password_confirmation;

    public function __construct($name, $email, $password, $celular, $password_confirmation)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->celular = $celular;
        $this->password_confirmation = $password_confirmation;
    }
}
