<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: El Modelo de crear Examen
* Autor: José Alejandro Cruz Medina 
* Fecha: 17/03/2021

* Descripción:Generar filtros para califiaciones
* Funcionalidad: Generar buscador para calificaciones
* Autor: Isaac Gamaliel Muñiz Amaro
* Fecha: 17/03/2021
*/


class Examen extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'examen';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idDocente',
        'titulo',
        'id_tema',
        'id_parcial',
        'id_alumno',
        'calificacion',
        'horaInicio',
        'horaFin',
        'intentos',
        'fechaInicio',
        'fechaFin',
        'ponderacion',
        'numero_parcial'
    ];
}
