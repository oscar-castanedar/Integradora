<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción:  
* Autor:
* Fecha: 
*/

class AvanceCurso extends Eloquent{
	protected $connection = 'mongodb';
    protected $collection = 'avance_curso';

    protected $fillable = [
        'id_alumno',
        'id_curso',
        'ultima_vista',
        'progreso'
    ];
}
