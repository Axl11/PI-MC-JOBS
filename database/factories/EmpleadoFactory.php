<?php

namespace Database\Factories;

use App\Models\Departamento;
use App\Models\Empleado;
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

    /**
     * Configure the model factory.
     *
     * Despues de crear un empleado, se tomarán dos departamentos previamente creados,
     * se relacionarán con este empleado
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Empleado $empleado){
            $departamentos = Departamento::inRandomOrder()->limit(2)->get();
            $empleado->departamentos()->attach($departamentos);
        });
    }
}
