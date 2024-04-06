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
            'Aguarda documentação',
            'Aprovado em 1ª fase',
            'Aprovado em 2ª fase',
            'Não compareceu à entrevista',
            'Inválido',
            'Pendente de pagamento',
            'Em processo de matrícula',
        ];

        foreach ($estados as $estado) {
            EstadoCandidatura::create(['estado' => $estado]);
        }
    }
}
