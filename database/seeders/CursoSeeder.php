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
        $cursos = [
            'Português-EMC',
            'Geografia',
            'Matemática-Física',
            'Educação-Primária',
            'Educação-Física',
        ];

        foreach ($cursos as $estado) {
            Curso::create([
                'name' => $estado,
                'descricao' => 'Curso de ' . $estado,
            ]);
        }
    }
}
