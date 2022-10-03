<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombreEmpleado',
        'apellidoEmpleado',
        'numeroSeguroSocialEmpleado',
        'puestoLaboralEmpleado',
        'sueldoEmpleado',
        'rfcEmpleado',
        'fechaNacimientoEmpleado',
        'curpEmpleado',
        'antiguedadEmpleado'];

    /* protected $guarded = ['id']; */
}
