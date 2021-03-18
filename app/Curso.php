<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Curso extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'cursos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','inicio','fin',
    ];
}