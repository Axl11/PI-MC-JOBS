<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombreEmpleado' => $this->faker->name(),
            'apellidoEmpleado' => $this->faker->lastName(),
            'numeroSeguroSocialEmpleado' => $this->faker->regexify('[0-9]{11}'),
            'puestoLaboralEmpleado' => $this->faker->word(),
            'sueldoEmpleado' => $this->faker->randomFloat(2, 1, 999999),
            'rfcEmpleado' => $this->faker->regexify('[0-9]{13}'),
            'fechaNacimientoEmpleado' => $this->faker->date(),
            'curpEmpleado' => $this->faker->regexify('[A-Z\d]{18}'),
            'antiguedadEmpleado' => $this->faker->numberBetween(1, 50),
        ];
    }
}
