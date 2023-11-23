<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformacoesTable extends Migration
{
    public function up()
    {
        Schema::create('informacoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('cpf')->nullable();
            $table->enum('pessoa', ['Pessoa Física', 'Pessoa Jurídica']);
            $table->string('endereco')->nullable();
            $table->string('cep')->nullable();
            $table->string('numero')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('estado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('rg')->nullable();
            $table->date('data_emissao_rg')->nullable();
            $table->string('orgao_emissor_rg')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('informacoes');
    }
}


