<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public $table = 'contactos';
    protected $fillable = [
        'tipo', 'descripcion'
    ];
}
