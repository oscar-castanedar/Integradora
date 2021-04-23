<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tema extends Eloquent
{
    use HasFactory;
    /**
    * Descripción: Administración de Tema
    * Funcionalidad: Ver Tema
    * Autor: Oscar David Castañeda Rivera
    * Fecha: 16/03/2021
    */
    protected $collection = 'tema';
    protected $fillable = [
        'id_curso',
        'id_parcial',
        'nombre_tema'
    ];

}