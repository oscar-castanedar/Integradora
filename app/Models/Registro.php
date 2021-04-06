<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Administración del registro al ingresar a algún curso
* Funcionalidad: Ver y/o editar el registro que tiene cada participante de cada curso
* Autor: Oscar David Castañeda Rivera
* Fecha: 16/03/2021
*/

class Registro extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'registro';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'porcentaje',
        'registro',
        'idAlumno',
        'idCurso',
    ];
}
