<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: El Modelo de crear pregutas para el banco de reactivos.
* Autor: José Alejandro Cruz Medina 
* Fecha: 17/03/2021
* Descripción: Vizualizar el curso una vez que esta ya haya sido creado y realizar modificaciomes.
* Funcionalidad: Ver y / o editar el curso, una vez que este ya haya sido creado.
* Autor: Cabello Salas Juan Carlos.
* Fecha: 19/03/2020
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
