<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre', 'orden', 'file_image',
    ];

    public function subcategorias()
    {
        return $this->hasMany('App\Subcategoria');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
