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
        Schema::create('vacantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreVacante');
            $table->string('descripcionVacante');
            $table->unsignedDecimal('sueldoVacante', 8, 2)->nullable();
            $table->string('direccionVacante');
            $table->string('horarioVacante')->nullable();
            $table->smallInteger('puestosDisponibles')->nullable()->default(0);
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
        Schema::dropIfExists('vacantes');
    }
};
