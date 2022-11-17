<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'nombreEmpresa',
        'descripcionEmpresa',
    ];

    /* protected $guarded = ['id']; */

    /* Una Empresa puede tener muchas Vacantes
    Se relaciona desde una Empresa sus Vacantes, 
    la cual tiene muchas instancias del modelo Vacante */
    public function vacantes()
    {
        return $this->hasMany(Vacante::class);
    }
}
