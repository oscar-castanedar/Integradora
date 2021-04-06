<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: El Modelo de crear Examen
* Autor: José Alejandro Cruz Medina 
* Fecha: 17/03/2021
*/

class Banco extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'examen';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'horaInicio',
        'horaFin',
        'volorExamen',
        'intentos',
        'fechainicio',
        'fechaFin',

    ];
}
