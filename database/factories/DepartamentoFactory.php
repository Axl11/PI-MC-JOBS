<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Departamento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Departamento>
 */
class DepartamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreDepartamento' => $this->faker->company(),
            'descripcionDepartamento' => $this->faker->realTextBetween($minNbChars = 30, $maxNbChars = 100, $indexSize = 2),
        ];
    }
}
