<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Administración de Cursos
* Funcionalidad: Ingresar o Ver Curso
* Autor: Oscar David Castañeda Rivera
* Fecha: 16/03/2021
* Descripción: Administración de Cursos
* Funcionalidad: Crear Curso
* Autor: María Concepción Cárdenas Rincón
* Fecha: 17/03/2021
* Descripción:Secuencia didáctica de actividades por parcial o total
* Funcionalidad: Generar secuencia didáctica del curso
* Autor: Isaac Gamaliel Muñiz Amaro
* Fecha: 17/03/2021
* Descripción: Vizualizar el curso una que este ya haya sido creado y realizar modificaciones o volverlo a publicar.
* Funcionalidad: Ver y / o editar el curso, una vez que este ya haya sido creado.
* Autor: Cabello Salas Juan Carlos.
* Fecha: 17/03/2020
*/
class Curso extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'cursos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_curso',
        'no_parcial',
        'activado',
        'estado_curso',
        'resumen_curso',
        'fecha',
    ];
}
