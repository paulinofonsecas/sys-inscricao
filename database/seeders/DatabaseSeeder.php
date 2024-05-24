<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Periodo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


        $this->call([
            StatusSeeder::class,
            TipoUsuarioSeeder::class,
            ClasseSeeder::class,
            CursoSeeder::class,
            PeriodoSeeder::class,
            EstadoCandidaturaSeeder::class,
            GeneroSeeder::class,
            AdministradorSeeder::class,
            TecnicoSeeder::class,
        ]);
    }
}
