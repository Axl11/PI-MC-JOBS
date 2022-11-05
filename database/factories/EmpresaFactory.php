<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreEmpresa' => $this->faker->company(),
            'descripcionEmpresa' => $this->faker->realTextBetween($minNbChars = 30, $maxNbChars = 100, $indexSize = 2),
        ];
    }
}
