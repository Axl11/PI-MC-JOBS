<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombreVacante', 
        'descripcionVacante', 
        'empresa_id',
        'sueldoVacante', 
        'direccionVacante', 
        'horarioVacante', 
        'puestosDisponibles'
    ];

    /* Una Vacante puede ser asignada por una Empresa
    Se relaciona desde una Vacante su Empresa, 
    la cual tiene una instancia del modelo Empresa */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
