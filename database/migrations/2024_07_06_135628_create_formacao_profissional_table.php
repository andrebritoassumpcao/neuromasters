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
        Schema::create('formacao_profissional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profissional_id');
            $table->string('instituicao_ensino');
            $table->string('curso');
            $table->string('formacao');
            $table->string('inicio_mes');
            $table->year('inicio_ano');
            $table->string('fim_mes')->nullable();
            $table->year('fim_ano')->nullable();
            $table->text('descricao_curso')->nullable();
            $table->text('especialidades')->nullable();
            $table->timestamps();
            $table->foreign('profissional_id')->references('id')->on('profissionais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formacao_profissional');
    }
};
