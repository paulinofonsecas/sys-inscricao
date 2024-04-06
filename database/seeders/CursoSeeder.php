<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Curso::create([
            'name' => 'Administração',
            'descricao' => 'Curso de Administração',
        ]);

        Curso::create([
            'name' => 'Engenharia de Computação',
            'descricao' => 'Curso de Engenharia de Computação',
        ]);

        Curso::create([
            'name' => 'Engenharia Eletrica',
            'descricao' => 'Curso de Engenharia Eletrica',
        ]);

        Curso::create([
            'name' => 'Engenharia Mecanica',
            'descricao' => 'Curso de Engenharia Mecanica',
        ]);

        Curso::create([
            'name' => 'Engenharia Quimica',
            'descricao' => 'Curso de Engenharia Quimica',
        ]);

        Curso::create([
            'name' => 'Engenharia de Software',
            'descricao' => 'Curso de Engenharia de Software',
        ]);

        Curso::create([
            'name' => 'Engenharia de Computação',
            'descricao' => 'Curso de Engenharia de Computação',
        ]);

        Curso::create([
            'name' => 'Engenharia de Computação',
            'descricao' => 'Curso de Engenharia de Computação',
        ]);
    }
}
