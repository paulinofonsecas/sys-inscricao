<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Tecnico Operador',
            'email' => 'tecnico@tecnico.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Tecnico::create([
            'bi' => '123456780',
            'nascimento' => '2000-01-01',
            'telefone' => '123456789',
            'endereco' => 'Endereço',
            'user_id' => $user->id,
            'tipo_usuario_id' => 1,
            'status_id' => 1,
        ]);
    }
}
