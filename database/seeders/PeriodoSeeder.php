<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Periodo::create([
            'desc' => 'Manhã',
        ]);

        \App\Models\Periodo::create([
            'desc' => 'Tarde',
        ]);

        \App\Models\Periodo::create([
            'desc' => 'Noite',
        ]);
    }
}
