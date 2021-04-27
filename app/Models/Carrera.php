<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
/**
* Descripción:Generar filtros para califiaciones
* Funcionalidad: Generar buscador para calificaciones
* Autor: Isaac Gamaliel Muñiz Amaro
* Fecha: 17/03/2021
*/

class Carrera extends Eloquent
{
    use HasFactory;

    protected $collection = 'carrera';
    protected $fillable = [
        'nombre_carrera',
        'descripcion',
    ];

    //Funcion para filtro
    public function scopeCarreras($query, $carreras){
        if($carreras)
        return $query->where('nombre_carrera',$carreras);
    }

}
