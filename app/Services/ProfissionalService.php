<?php

namespace App\Services;

use App\Repositories\ProfissionalRepository;
use App\DTO\ProfissionalDTO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;

class ProfissionalService
{
    protected $profissionalRepository;

    public function __construct(ProfissionalRepository $profissionalRepository)
    {
        $this->profissionalRepository = $profissionalRepository;
    }

    // Validação dos dados de entrada
    public function validateSearchData(array $data): void
    {
        $validator = Validator::make($data, [
            'name' => 'nullable|string',
            'profissao' => 'nullable|string',
            'assunto' => 'nullable|string',
        ], [
            'name.string' => 'O campo de nome deve ser um texto válido.',
            'profissao.string' => 'O campo de profissão deve ser um texto válido.',
            'assunto.string' => 'O campo de competência deve ser um texto válido.',
        ]);

        // Se a validação falhar, lançar uma exceção
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    // Método para buscar os profissionais
    public function search(ProfissionalDTO $searchDTO)
    {
        // Buscar os profissionais no repositório
        $profissionais = $this->profissionalRepository->search($searchDTO);

        // Se não encontrar nenhum profissional, lançar exceção
        if ($profissionais->isEmpty()) {
            throw new Exception('Nenhum profissional encontrado com os filtros aplicados.');
        }

        return $profissionais;
    }
}
