<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: 
* Funcionalidad: 
* Autor:
* Fecha:
*
*Descripción: Administración del rendimiento de los alumnos de manera parcial o global.
* Funcionalidad:Consultar el progreso de los alumnos inscritos.
* Autor:María Daniela García Luna.
* Fecha:17/03/2021

* Descripción: Generar constancia de conclusion del curso.
* Funcionalidad: Consultar porcentaje del curso para generar constancia.
* Autor:Isaac Gamaliel Muñiz Amaro
* Fecha:17/03/2021

* Descripción: Vizualizar el curso en la pantalla alumno.
* Funcionalidad: Listar los cursos del alumno.
* Autor: Lopez Cortes Adan.
* Fecha: 18/03/2020
*/

class Progreso extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'progreso';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idAlumno',
        'idCurso',
        'porcentaje',
        'fecha',
    ];
}
