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
    protected $collection = 'actividad';

    protected $fillable = [
        'nombre_tema',
        'nombre_actividad',
        'fecha_entrega',
        'valor',
        'descripcion'
    ];
}
