<?php

namespace App\DTO;

class UserDTO
{
    public $name;
    public $email;
    public $password;
    public $celular;

    public function __construct($name, $email, $password, $celular)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->celular = $celular;
    }
}
