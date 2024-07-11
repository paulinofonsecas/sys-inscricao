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
            $table->string('name');
            $table->string('name_do_pai')->nullable();
            $table->string('name_da_mae')->nullable();
            $table->string('email')->unique()->nullable();
            $table->foreignId('curso_id')->constrained('cursos');
            $table->foreignId('classe_id')->constrained('classes');
            $table->foreignId('periodo_id')->constrained('periodos');
            $table->foreignId('genero_id')->constrained('generos');
            $table->string('bi');
            $table->string('telefone');
            $table->string('endereco')->nullable();
            $table->boolean('isActive')->default(true);
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
        Schema::dropIfExists('matriculas');
    }
};
