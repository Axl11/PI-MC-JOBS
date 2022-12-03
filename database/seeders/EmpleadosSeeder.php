<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create(['nombreEmpleado' => 'Axl', 'apellidoEmpleado' => 'Coronado', 'numeroSeguroSocialEmpleado' => '12345678912', 'puestoLaboralEmpleado' => 'Community Manager', 'sueldoEmpleado' => '1000', 'rfcEmpleado' => '1234567891234', 'fechaNacimientoEmpleado' => '2022-03-04', 'curpEmpleado' => 'COCB020304HJCRBRA8', 'antiguedadEmpleado' => '5']);
        Empleado::create(['nombreEmpleado' => 'Eduardo', 'apellidoEmpleado' => 'Martinez', 'numeroSeguroSocialEmpleado' => '12345678913', 'puestoLaboralEmpleado' => 'Conserje', 'sueldoEmpleado' => '1020', 'rfcEmpleado' => '1234567891235', 'fechaNacimientoEmpleado' => '2022-03-04', 'curpEmpleado' => 'COCB020304HJCRBRA7', 'antiguedadEmpleado' => '3']);
    
        Empleado::factory(6)->create();
    }
}
