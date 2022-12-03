<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Vacante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VacantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vacante::create([
            'nombreVacante' => 'Contador',
            'descripcionVacante' => 'Llevar el control economico de la empresa y manejar impuestos',
            'sueldoVacante' => '12000.00',
            'direccionVacante' => 'Av. Juarez 234 Col. Tonaltecas',
            'horarioVacante' => 'Lunes y Martes 09:00 - 13:00',
            'puestosDisponibles' => '2',
            'empresa_id' => Empresa::inRandomOrder()->first()->id
        ]);
        Vacante::create([
            'nombreVacante' => 'Operador de Producción',
            'descripcionVacante' => 'Operar la producción del producto',
            'sueldoVacante' => '18500.50',
            'direccionVacante' => 'Col. Americana, Guadalajara',
            'horarioVacante' => 'Lunes, Martes y Jueves 09:00 - 13:00',
            'puestosDisponibles' => '5',
            'empresa_id' => Empresa::inRandomOrder()->first()->id
        ]);

        Vacante::factory(2)->create();
    }
}
