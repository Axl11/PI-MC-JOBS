<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Aquí definidos nuestro repositorio de clases Seeder que deseamos ejecutar
        $this->call(UsersSeeder::class);
        $this->call(DepartamentosSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(EmpresasSeeder::class);
        $this->call(VacantesSeeder::class);
    }
}
