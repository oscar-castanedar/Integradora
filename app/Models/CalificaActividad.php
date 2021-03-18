<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción: 
* Autor: José Guillermo Balderas Zamora
* Fecha: 17/03/2021
*/
class UsuarioActividad extends Eloquent{
	protected $connection = 'mongodb';
	protected $collection = 'usuario_actividad';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'calificacion',
        'retroalimentacion',
        'fecha_envio',
    ];
    
    public function usuario() {
        return $this->belongsTo(User::class);
    }
    
    public function actividad() {
        return $this->belongsTo(Actividad::class);
    }
}
