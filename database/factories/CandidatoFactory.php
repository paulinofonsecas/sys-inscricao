<?php

namespace Database\Factories;

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
            'endereco' => $this->faker->address(),
            'curso_feito' => $this->faker->sentence(),
            'estado_candidatura_id' => $this->faker->numberBetween(1, 3),
            'curso_id' => $this->faker->numberBetween(1, 3),
            'classe_feita_id' => $this->faker->numberBetween(1, 3),
            'classe_id' => $this->faker->numberBetween(1, 3),
            'periodo_id' => $this->faker->numberBetween(1, 3),
            'copia_bi_url' => $this->faker->url(),
            'certificado_url' => $this->faker->url(),
            'user_id' => User::all()->random()->id,
        ];
    }
}
