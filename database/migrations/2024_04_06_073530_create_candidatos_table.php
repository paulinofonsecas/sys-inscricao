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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('bi');
            $table->string('telefone');
            $table->foreignId('genero_id')->constrained('generos');
            $table->string('endereco')->nullable();
            $table->string('curso_feito');
            $table->foreignId('estado_candidatura_id')->constrained('estado_candidaturas');
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('classe_feita_id')->constrained('classes');
            $table->foreignId('classe_id')->constrained('classes');
            $table->foreignId('periodo_id')->constrained('periodos');
            $table->string('copia_bi_url');
            $table->string('certificado_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};

/* Em fata, estado da candidatura */
