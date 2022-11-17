<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vacante extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'nombreVacante', 
        'descripcionVacante', 
        'empresa_id',
        'sueldoVacante', 
        'direccionVacante', 
        'horarioVacante', 
        'puestosDisponibles',
    ];

    /* Una Vacante puede ser asignada por una Empresa
    Se relaciona desde una Vacante su Empresa, 
    la cual tiene una instancia del modelo Empresa */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    /* Una Vacante puede tener muchas Solicitudes
    Se relaciona desde una Vacante sus Solicitudes, 
    la cual tiene muchas instancias del modelo Solicitude 
    (relacion 1:N) */
    public function solicitudes()
    {
        return $this->hasMany(Solicitude::class);
    }
}
