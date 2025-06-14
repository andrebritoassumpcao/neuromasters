<?php

namespace App\Repositories;

use App\Models\Beneficiarios;
use Illuminate\Support\Facades\Storage;

class BeneficiarioRepository
{
    public function create(array $data)
    {
        return Beneficiarios::create($data);
    }

    public function findBeneficiario($id)
    {
        return Beneficiarios::findOrFail($id);
    }

    public function updateFoto($beneficiario, $path)
    {
        if ($beneficiario->foto) {
            Storage::delete($beneficiario->foto);
        }
        $beneficiario->update(['foto' => $path]);
    }
}
