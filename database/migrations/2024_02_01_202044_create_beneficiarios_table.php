<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_beneficiario');
            $table->string('cpf_beneficiario')->unique();
            $table->string('telefone');
            $table->date('data_nascimento');
            $table->char('sexo', 20);
            $table->decimal('peso', 5, 2);
            $table->decimal('altura', 5, 2);
            $table->string('identidade');
            $table->date('data_emissao_identidade');
            $table->string('orgao_emissor_identidade');
            $table->string('diagnostico_principal');
            $table->text('detalhes_diagnostico');
            $table->string('nome_mae');
            $table->string('cpf_mae')->unique();
            $table->string('profissao_mae');
            $table->string('nome_pai');
            $table->string('cpf_pai')->unique();
            $table->string('profissao_pai');
            $table->string('estado_civil_pais');
            $table->string('cep');
            $table->string('rua');
            $table->string('bairro');
            $table->string('estado');
            $table->string('cidade');
            $table->string('numero');
            $table->string('complemento')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiarios');
    }
};
