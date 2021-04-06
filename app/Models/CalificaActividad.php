<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: 
* Autor: José Guillermo Balderas Zamora
* Fecha: 17/03/2021
*/
class CalificaActividad extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'actividad_calificacion';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'calificacion',
        'retroalimentacion',
        'fecha_envio',
    ];
}
