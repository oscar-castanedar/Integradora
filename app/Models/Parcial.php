<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: Administración de Parcial
* Funcionalidad: Ver Parcial
* Autor: Oscar David Castañeda Rivera
* Fecha: 16/03/2021
*/
class Parcial extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'parcial';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'id_curso',
        'id_parcial'
    ];
}
