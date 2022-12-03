<?php

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacante>
 */
class VacanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreVacante' => $this->faker->company(),
            'descripcionVacante' => $this->faker->realTextBetween($minNbChars = 30, $maxNbChars = 80, $indexSize = 2),
            'sueldoVacante' => $this->faker->randomFloat(2, 1, 999999),
            'direccionVacante' => $this->faker->address(),
            'horarioVacante' => $this->faker->dayOfWeek(),
            'puestosDisponibles' => $this->faker->randomDigitNot(0),
            'empresa_id' => Empresa::inRandomOrder()->first()->id
        ];
    }
}
