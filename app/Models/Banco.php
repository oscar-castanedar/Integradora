<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: El Modelo de crear pregutas para el banco de reactivos.
* Autor: José Alejandro Cruz Medina 
* Fecha: 17/03/2021.
*/

class Pregunta extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'pregunta';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
        'tipo',
        'ruta_imagen',
        'puntaje',
        'retroalimentacion',
        'opcion_respuesta',

    ];
}
