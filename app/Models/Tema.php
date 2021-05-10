<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tema extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'tema';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_tema',
        'descripcion',
        'id_curso',
        'id_parcial',
    ];
}
