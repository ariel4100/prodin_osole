<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoRelacionados extends Model
{
    protected $fillable = [
        'producto', 'orden', 'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
