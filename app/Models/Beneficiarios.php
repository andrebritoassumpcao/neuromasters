<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Beneficiarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_beneficiario',
        'cpf_beneficiario',
        'telefone',
        'data_nascimento',
        'sexo',
        'peso',
        'altura',
        'identidade',
        'data_emissao_identidade',
        'orgao_emissor_identidade',
        'diagnostico_principal',
        'detalhes_diagnostico',
        'nome_mae',
        'cpf_mae',
        'profissao_mae',
        'nome_pai',
        'cpf_pai',
        'profissao_pai',
        'estado_civil_pais',
        'cep',
        'rua',
        'bairro',
        'estado',
        'cidade',
        'numero',
        'complemento',
        'foto',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
