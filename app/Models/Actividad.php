<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Modelo para administracion de entregar de actividad del usuario 
* Autor: Miguel Arturo Rojas Hernández
* Fecha: 17/03/2021
*/

class Actividad extends Eloquent{
	protected $connection = 'mongodb';
    protected $collection = 'Actividad';

    protected $fillable = [
        'estatus_calificacion',
        'nombre_actividad',
        'estatus_entrega',
        'ultima_modificacion',
        'fecha_entrega',
        'tiempo_restante',
        'link_archivo'
    ];
}
