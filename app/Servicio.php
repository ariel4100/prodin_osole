<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'descripcion_breve','file_image','orden'
    ];
}
