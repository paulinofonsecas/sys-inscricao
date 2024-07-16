<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            'Aceite',
            'Pendente',
            'Em análise',
            'Recusado',
            'Lista de espera',
            'Inválido',
            'Em processo de matrícula',
        ];

        foreach ($estados as $estado) {
            Status::create([
                'descricao' => $estado,
            ]);
        }
    }
}
