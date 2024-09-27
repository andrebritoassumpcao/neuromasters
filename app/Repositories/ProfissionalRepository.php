<?php

namespace App\Repositories;

use App\Models\ProfissionalUser;

class ProfissionalRepository
{
    public function search($searchDTO)
    {
        $query = ProfissionalUser::query();

        if (!empty($searchDTO->name)) {
            $query->where('name', 'like', '%' . $searchDTO->name . '%');
        }

        if (!empty($searchDTO->especialidade) && $searchDTO->especialidade !== 'Selecione') {
            $query->where('especialidade', $searchDTO->especialidade);
        }

        if (!empty($searchDTO->competencias) && $searchDTO->competencias !== 'Selecione') {
            $query->where('competencias', 'like', '%' . $searchDTO->competencias . '%');
        }

        return $query->get();
    }
}
