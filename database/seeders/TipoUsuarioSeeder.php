<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TipoUsuario::create([
            'descricao' => 'Administrador',
        ]);
        \App\Models\TipoUsuario::create([
            'descricao' => 'Candidato',
        ]);
    }
}
