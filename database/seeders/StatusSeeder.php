<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'descricao' => 'Ativo',
        ]);
        Status::create([
            'descricao' => 'Inativo',
        ]);
    }
}
