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
*/
class Curso extends Eloquent{
	protected $connection = 'mongodb';
    
	protected $collection = 'curso';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_curso',
        'nombre_periodo',
        'fecha_inicio_curso',
        'fecha_fin_curso',
        'status_curso',
        'resumen_curso',
        'descripcion_curso',
        'estudiantes'
    ];
}
