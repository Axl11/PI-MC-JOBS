<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombreEmpleado', 50);
            $table->string('apellidoEmpleado', 50);
            $table->string('numeroSeguroSocialEmpleado', 11)->default('0');
            $table->string('puestoLaboralEmpleado', 30);
            $table->unsignedDecimal('sueldoEmpleado', 8, 2)->default(0.0);
            $table->string('rfcEmpleado', 13);
            $table->date('fechaNacimientoEmpleado');
            $table->string('curpEmpleado', 18);
            $table->unsignedInteger('antiguedadEmpleado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
