<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Genero::create([
            'desc' => 'Masculino',
        ]);
        \App\Models\Genero::create([
            'desc' => 'Feminino',
        ]);
    }
}
