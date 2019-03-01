<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaDestacado extends Model
{
    public $table = 'categoria_destacados';


    protected $fillable = [
        'orden', 'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
