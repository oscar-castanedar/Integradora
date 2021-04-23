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
        'id_curso',
        'id_parcial',
        'nombre_tema'
    ];

}