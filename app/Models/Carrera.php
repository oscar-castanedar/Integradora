<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Carrera extends Eloquent
{
    use HasFactory;

    protected $collection = 'carrera';
    protected $fillable = [
        'nombre_carrera',
    ];

}
