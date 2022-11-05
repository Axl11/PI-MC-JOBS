<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::create(['nombreEmpresa' => 'ELITE-SI', 'descripcionEmpresa' => 'Empresa 100% mexicana que se dedica al outsourcing']);
        Empresa::create(['nombreEmpresa' => 'BKT', 'descripcionEmpresa' => 'Operan sistemas de bicicletas compartidas adaptadas a tu ciudad y sus necesidades de micromovilidad.']);

        Empresa::factory(10)->create();
    }
}
