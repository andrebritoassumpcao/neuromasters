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
    Schema::table('profissionais', function (Blueprint $table) {
        // Adiciona a coluna atendimento com os valores específicos
        $table->string('atendimento')->nullable();

    });
}

public function down()
{
    Schema::table('profissionais', function (Blueprint $table) {
        // Remove a coluna atendimento se a migration for revertida
        $table->dropColumn('atendimento');
    });
}
};
