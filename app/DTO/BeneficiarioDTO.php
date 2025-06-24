<?php

namespace App\DTO;

class BeneficiarioDTO
{
    public $name;
    public $cpf;
    public $celular;
    public $nascimento;
    public $sexo;
    public $peso;
    public $altura;
    public $identidade;
    public $emissao;
    public $orgao;
    public $diagnostico;
    public $diagnostico_detalhes;
    public $nome_mae;
    public $cpf_mae;
    public $profissao_mae;
    public $nome_pai;
    public $cpf_pai;
    public $profissao_pai;
    public $estado_civil_pais;
    public $cep;
    public $logradouro;
    public $bairro;
    public $uf;
    public $localidade;
    public $numero;
    public $complemento;
    public $user_id;

    public function __construct(array $data)
    {
        $this->name = $data['name'] ?? null;
        $this->cpf = $data['cpf'] ?? null;
        $this->celular = $data['celular'] ?? null;
        $this->nascimento = $data['nascimento'] ?? null;
        $this->sexo = $data['sexo'] ?? null;
        $this->peso = $data['peso'] ?? null;
        $this->altura = $data['altura'] ?? null;
        $this->identidade = $data['identidade'] ?? null;
        $this->emissao = $data['emissao'] ?? null;
        $this->orgao = $data['orgao'] ?? null;
        $this->diagnostico = $data['diagnostico'] ?? null;
        $this->diagnostico_detalhes = $data['diagnostico_detalhes'] ?? null;
        $this->nome_mae = $data['nome_mae'] ?? null;
        $this->cpf_mae = $data['cpf_mae'] ?? null;
        $this->profissao_mae = $data['profissao_mae'] ?? null;
        $this->nome_pai = $data['nome_pai'] ?? null;
        $this->cpf_pai = $data['cpf_pai'] ?? null;
        $this->profissao_pai = $data['profissao_pai'] ?? null;
        $this->estado_civil_pais = $data['estado_civil_pais'] ?? null;
        $this->cep = $data['cep'] ?? null;
        $this->logradouro = $data['logradouro'] ?? null;
        $this->bairro = $data['bairro'] ?? null;
        $this->uf = $data['uf'] ?? null;
        $this->localidade = $data['localidade'] ?? null;
        $this->numero = $data['numero'] ?? null;
        $this->complemento = $data['complemento'] ?? null;
        $this->user_id = $data['user_id'] ?? null;
    }

    // Método toArray para converter o DTO em um array associativo
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'cpf' => $this->cpf,
            'celular' => $this->celular,
            'nascimento' => $this->nascimento,
            'sexo' => $this->sexo,
            'peso' => $this->peso,
            'altura' => $this->altura,
            'identidade' => $this->identidade,
            'emissao' => $this->emissao,
            'orgao' => $this->orgao,
            'diagnostico' => $this->diagnostico,
            'diagnostico_detalhes' => $this->diagnostico_detalhes,
            'nome_mae' => $this->nome_mae,
            'cpf_mae' => $this->cpf_mae,
            'profissao_mae' => $this->profissao_mae,
            'nome_pai' => $this->nome_pai,
            'cpf_pai' => $this->cpf_pai,
            'profissao_pai' => $this->profissao_pai,
            'estado_civil_pais' => $this->estado_civil_pais,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'bairro' => $this->bairro,
            'uf' => $this->uf,
            'localidade' => $this->localidade,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'user_id' => $this->user_id,
        ];
    }
}
