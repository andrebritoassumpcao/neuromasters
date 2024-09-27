<?php

namespace App\DTO;

class ProfissionalDTO
{
    public $name;
    public $especialidade;
    public $competencias;

    public function __construct(string $name = null, string $especialidade = null, string $competencias = null)
    {
        $this->name = $name;
        $this->especialidade = $especialidade;
        $this->competencias = $competencias;
    }
}
