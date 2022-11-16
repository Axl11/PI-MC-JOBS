<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombreUser',
        'apellidoUser',
        'edadUser',
        'ciudadUser',
        'coloniaUser',
        'telefonoUser',
        'correoUser',
        'vacante_id'
    ];

    /* Una Solicitude puede ser asignada por una Vacante
    Se relaciona desde una Solicitude su Vacante, 
    la cual tiene una instancia del modelo Vacante */
    public function vacante()
    {
        return $this->belongsTo(Vacante::class);
    }
}
