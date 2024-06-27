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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('codigo_profissional')->unique();
            $table->string('name');
            $table->string('password');
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->timestamps();
            $table->string('cpf')->unique()->length(14)->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('conselho_regional');
            $table->string('numero_conselho');
            $table->string('especialidade');
            $table->string('resumo_profissional');
            $table->string('atendimento')->nullable();
            $table->string('foto')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais');
    }
};
