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
        Schema::create('operadors', function (Blueprint $table) {
            $table->id();
            $table->string("bi");
            $table->dateTime("nascimento");
            $table->string("telefone");
            $table->string("endereco");
            $table->foreignId("tipo_usuario_id")->constrained('tipo_usuarios');
            $table->foreignId("status_id")->constrained("statuses");
            $table->foreignId("user_id")->constrained("users");
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operadors');
    }
};
