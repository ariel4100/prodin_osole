<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logos extends Model
{
    protected $fillable = [
        'ubicacion', 'file_image'
    ];
}
