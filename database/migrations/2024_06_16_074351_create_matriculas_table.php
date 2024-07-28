<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->string("nome_pai");
            $table->string("nome_mae");
            $table->string("profissao_pai")->nullable();
            $table->string("profissao_mae")->nullable();
            $table->string("telefone")->nullable();
            $table->string("local_trabalho")->nullable();
            $table->string("profissao")->nullable();
            $table->string("religiao")->nullable();
            $table->string("funsao_igreja")->nullable();

            $table->string("escola_ensino_basico")->nullable();
            $table->string("ano_de_formatura_basico")->nullable();
            $table->foreignId("curso_id")->constrained();
            $table->foreignId("candidato_id")->constrained();

            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matriculas');
    }
};
