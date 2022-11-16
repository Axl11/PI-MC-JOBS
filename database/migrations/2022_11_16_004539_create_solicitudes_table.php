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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombreUser', 50);
            $table->string('apellidoUser', 50);
            $table->tinyInteger('edadUser')->unsigned();
            $table->string('ciudadUser', 30);
            $table->string('coloniaUser', 30);
            $table->string('telefonoUser', 10);
            $table->string('correoUser');
            /* $table->binary('cvUser'); */
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
        Schema::dropIfExists('solicitudes');
    }
};
