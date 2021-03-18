<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
 * Descripción: Administración que crea periodos
 * Funcionalidad: Crear nuevos periodos.
 * Autor: Rodríguez Flores Raúl Alberto
 * Fecha: 17/03/2021
 */

class Periodo extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'periodo';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_periodo','fecha_inicio','fecha_fin','status_periodo'
    ];
}