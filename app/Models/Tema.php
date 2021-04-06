<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tema extends Eloquent
{
    use HasFactory;
    /**
     * 
     * @var array
     * 
     */
    protected $collection = 'tema';
    protected $fillable = [
        'nombre_curso',
        'nombre_tema'
    ];

}