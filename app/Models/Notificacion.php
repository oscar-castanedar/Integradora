<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Administración de las notificaciones enviadas por el docente
* Funcionalidad: Enviar las notificiones a los praticpantes de los cursos 
* Autor: Pedro Emmanuel Martinez Rodriguez 
* Fecha: 17/03/2021
*/
/**
* Descripción: Leer notificaciones
* Funcionalidad: Consulta para que los participantes del curso lean sus notificaciones
* Autor: Ricardo Alexis Rioyos Ramiréz
* Fecha: 20/03/2021
*/

class Notificacion extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'notificacion';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'asunto',
        'fecha_envio',
        'status_notificacion',
        'usuarios'
    ];
}
