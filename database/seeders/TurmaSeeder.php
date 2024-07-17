<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class TurmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = Curso::all();

        $turmas = [
            '10ª A',
            '10ª B',
            '11ª A',
            '11ª B',
            '12ª A',
            '12ª B',
            '13ª A',
        ];


        foreach ($cursos as $curso) {
            foreach ($turmas as $nomeTurma) {
                $turma = new Turma();
                $turma->nome = $nomeTurma;
                $turma->ano_lectivo = '2022/2023';
                $turma->curso_id = $curso->id;
                $turma->save();
            }
        }
    }
}
