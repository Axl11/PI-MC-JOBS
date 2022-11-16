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
        'correoUser'
    ];
}
