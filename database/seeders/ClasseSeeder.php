<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // de 1ª até 13ª
        $classes = [
            '1ª',
            '2ª',
            '3ª',
            '4ª',
            '5ª',
            '6ª',
            '7ª',
            '8ª',
            '9ª',
            '10ª',
            '11ª',
            '12ª',
            '13ª',
        ];

        foreach ($classes as $class) {
            \App\Models\Classe::factory()->create([
                'name' => $class,
            ]);
        }
    }
}
