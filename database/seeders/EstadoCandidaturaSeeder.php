<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstadoCandidatura;

class EstadoCandidaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estados = [
            'Pendente',
            'Em análise',
            'Aceite',
            'Recusado',
            'Lista de espera',
            'Desistido',
            'Inválido',
            'Em processo de matrícula',
        ];

        foreach ($estados as $estado) {
            EstadoCandidatura::create(['estado' => $estado]);
        }
    }
}
