<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'descripcion', 'file_image', 'file_ficha', 'file_plano', 'link_mercadolibre','orden'
    ];


    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }


    public function galerias()
    {
        return $this->hasMany('App\Galeria');
    }

    public function destacado()
    {
        return $this->hasOne('App\ProductoDestacado');
    }
}
