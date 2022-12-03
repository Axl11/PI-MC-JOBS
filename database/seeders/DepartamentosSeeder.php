<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nombreDepartamento' => 'Contabilidad', 'descripcionDepartamento' => 'Es muy bueno']);
        Departamento::create(['nombreDepartamento' => 'Reclutamiento', 'descripcionDepartamento' => 'Es muy malo']);

        Departamento::factory(6)->create();
    }
}
