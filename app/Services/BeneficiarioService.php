<?php

namespace App\Services;

use App\DTO\BeneficiarioDTO;
use App\Repositories\BeneficiarioRepository;
use Carbon\Carbon;
use Exception;


class BeneficiarioService
{
    protected $beneficiarioRepository;

    public function __construct(BeneficiarioRepository $beneficiarioRepository)
    {
        $this->beneficiarioRepository = $beneficiarioRepository;
    }

    private function formatNumeric($value)
    {
        return str_replace(',', '.', $value);
    }

    public function createBeneficiario(BeneficiarioDTO $beneficiarioDTO)
    {
        $data = $beneficiarioDTO->toArray();

        $data['peso'] = $this->formatNumeric($data['peso']);
        $data['altura'] = $this->formatNumeric($data['altura']);

        if (!is_numeric($data['peso']) || !is_numeric($data['altura'])) {
            throw new Exception('Peso e altura devem ser valores numéricos.');
        }

        return $this->beneficiarioRepository->create($data);
    }

    public function findBeneficiario($id_beneficiario)
    {
        return $this->beneficiarioRepository->findBeneficiario($id_beneficiario);
    }

    public function calcularIdade($dataNascimento)
    {
        $dataNascimento = Carbon::parse($dataNascimento);
        return $dataNascimento->age;
    }

    public function getNameInitials($name)
    {
        $initials = '';
        $words = explode(' ', $name);

        if (isset($words[0])) {
            $initials .= strtoupper(substr($words[0], 0, 1));
        }

        if (count($words) > 1) {
            $initials .= strtoupper(substr($words[count($words) - 1], 0, 1));
        }

        return $initials;
    }

    public function updateFoto($id_beneficiario, $path)
    {
        $beneficiario = $this->beneficiarioRepository->findBeneficiario($id_beneficiario);
        $this->beneficiarioRepository->updateFoto($beneficiario, $path);
    }
}
