<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    /*Habilitamos las columnas 'created_at' y 'updated_at' */
    public $timestamps = true;

    /*Asignamos las variables que van a poder filtrarse para su manipulación */
    protected $fillable = [
        'solicitude_id',
        'ubicacion',
        'nombreOriginal',
        'mime'
    ];

    /* Un Archivo puede ser subido desde una Solicitude
    Se relaciona desde un Archivo la carga de Solicitude, 
    la cual tiene una instancia del modelo Solicitude */
    public function solicitude()
    {
        return $this->belongsTo(Solicitude::class);
    }
}
