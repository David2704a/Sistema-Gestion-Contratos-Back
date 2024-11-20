<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'primer_nombre',
        'segundo_nombre',
        'segundo_apellido',
        'primer_apellido',
        'identificacion',
        'fecha_nacimiento',
        'id_sede',
    ];
}
