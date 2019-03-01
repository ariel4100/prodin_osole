<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'titulo1', 'descripcion', 'file_image',
    ];
}
