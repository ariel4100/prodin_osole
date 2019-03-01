<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $fillable = [
        'nombre', 'orden', 'file_image',
    ];

    public function categorias()
    {
        return $this->belongsTo('App\Categoria');
    }
}
