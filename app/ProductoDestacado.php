<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoDestacado extends Model
{
    public $table = 'productos_destacados';

    protected $fillable = [
        'orden', 'producto_id',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
