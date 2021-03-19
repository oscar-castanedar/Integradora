<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: El Modelo de crear Examen
* Autor: José Alejandro Cruz Medina 
* Fecha: 17/03/2021
* Descripción: Vizualizar el curso una que este ya haya sido creado y realizar modificaciones.
* Funcionalidad: Ver y / o editar el curso, una vez que este ya haya sido creado.
* Autor: Cabello Salas Juan Carlos.
* Fecha: 19/03/2020.
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
