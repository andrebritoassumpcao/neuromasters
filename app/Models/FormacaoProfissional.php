<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormacaoProfissional extends Model
{
    use HasFactory;

    protected $table = 'formacao_profissional';

    protected $fillable = [
        'profissional_id',
        'instituicao_ensino',
        'curso',
        'formacao',
        'inicio_mes',
        'inicio_ano',
        'fim_mes',
        'fim_ano',
        'descricao_curso',
        'especialidades',
    ];

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(ProfissionalUser::class);
    }
}
