<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class ProfissionalUser extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'profissionais';

    protected $fillable = [
        'codigo_profissional',
        'name',
        'password',
        'email',
        'telefone',
        'celular',
        'cpf',
        'cep',
        'rua',
        'bairro',
        'estado',
        'cidade',
        'numero',
        'complemento',
        'conselho_regional',
        'numero_conselho',
        'especialidade',
        'resumo_profissional',
        'foto',
    ];
}
?>
