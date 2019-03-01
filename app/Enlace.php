<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    protected $fillable = [
        'nombre', 'file_image', 'orden','url'
    ];
}
