<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Administrador::create([
            'bi' => '123456789',
            'nascimento' => '2000-01-01',
            'telefone' => '123456789',
            'endereco' => 'Endereço',
            'user_id' => $user->id,
            'tipo_usuario_id' => 1,
            'status_id' => 1,
        ]);

    }
}
