<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombreDepartamento',
        'descripcionDepartamento',
    ];

    /* protected $guarded = ['id']; */

    /* Un Departamento puede tener muchos Empleados
    Se relaciona desde un Departamento sus Empleados, 
    la cual tiene muchas instancias del modelo Empleado (relacion muchos a muchos)*/
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class);
    }
}
