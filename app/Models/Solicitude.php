<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    /*Habilitamos las columnas 'created_at' y 'updated_at' */
    public $timestamps = true;

    /*Asignamos las variables que van a poder filtrarse para su manipulación */
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

    /*Una Solicitude puede tener muchos Archivos
    Se relaciona desde una Solicitude sus Archivos,
    la cual tiene muchas instancias del modelo Archivo
    (relación uno a muchos) */
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
