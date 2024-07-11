<?php

namespace Database\Factories;

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
            'nascimento' => $this->faker->date(),
            'genero_id' => $this->faker->numberBetween(1, 2),
            'telefone' => $this->faker->phoneNumber(),
            'endereco' => $this->faker->address(),
            'curso_feito' => $this->faker->sentence(),
            'estado_candidatura_id' => $this->faker->numberBetween(1, 3),
            'curso_id' => $this->faker->numberBetween(1, 3),
            'classe_feita_id' => $this->faker->numberBetween(1, 3),
            'classe_id' => $this->faker->numberBetween(1, 3),
            'periodo_id' => $this->faker->numberBetween(1, 3),
            'copia_bi_url' => $this->faker->url(),
            'certificado_url' => $this->faker->url(),
        ];
    }
}
