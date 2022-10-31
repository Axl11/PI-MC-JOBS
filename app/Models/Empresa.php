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
}