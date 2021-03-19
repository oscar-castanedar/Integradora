<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
 * Descripción: Administración de periodos
 * Funcionalidad: Administrar nuevos periodos.
 * Autor: Rodríguez Flores Raúl Alberto
 * Fecha: 17/03/2021
 * Descripción: Mostras el perido activo en la pantalla docente
 * Funcionalidad: Mostrar los periodos activos y inactivos(solo se podra ver los curosos pero no se podra ingrear a ellos)
 * Autor: Marin Reyes Saul Guadalupe
 * Fecha: 18/03/2021
 
 * Descripción: Mostras el perido activo en la pantalla alumno
 * Funcionalidad: De acuerdo con el periodo se muestran los cursos activos
 * Autor: Lopez Cortes Adan
 * Fecha: 18/03/2021
 */

class Periodo extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'Periodo';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_periodo',
        'fecha_inicio',
        'fecha_fin',
        'status_periodo'
    ];
}
