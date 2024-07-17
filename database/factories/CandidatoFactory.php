<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidato>
 */
class CandidatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bi' => $this->faker->unique()->numerify('##################'),
            'telefone' => $this->faker->phoneNumber(),
            'genero_id' => $this->faker->numberBetween(1, 2),
            'nascimento' => $this->faker->date(),
            'estado_candidatura_id' => $this->faker->numberBetween(1, 3),
            'curso_opcao_1' => Curso::all()->random()->id,
            'curso_opcao_2' => Curso::all()->random()->id,
            'copia_bi_url' => $this->faker->url(),
            'certificado_url' => $this->faker->url(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
