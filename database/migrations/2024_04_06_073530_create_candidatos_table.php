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
            $table->date('nascimento');
            $table->string('telefone');
            $table->foreignId('genero_id')->constrained();
            $table->foreignId('curso_opcao_1')->references('id')->on('cursos');
            $table->foreignId('curso_opcao_2')->references('id')->on('cursos');

            $table->string('copia_bi_url');
            $table->string('certificado_url');
            $table->string('foto_url')->nullable();
            $table->string('estado_candidatura_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->after('id');
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
