<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            TipoUsuarioSeeder::class,
        ]);

        \App\Models\User::factory(100)->create();

        $this->call([
            ClasseSeeder::class,
            CursoSeeder::class,
            PeriodoSeeder::class,
            EstadoCandidaturaSeeder::class,
            GeneroSeeder::class,
            AdministradorSeeder::class,
            TecnicoSeeder::class,
            CandidatorSeeder::class,
            TurmaSeeder::class,
        ]);
    }
}
