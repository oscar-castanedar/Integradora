<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Grupo extends Eloquent
{
    use HasFactory;

    protected $collection = 'grupo';
    protected $fillable = [
        'nombre_grupo',
        'semestre',
        'turno',
        'id_carrera',
        'alumnos'
    ];
    //Funcion para filtro
    public function scopeGrupos($query, $grupos){
        if($grupos)
        return $query->where('nombre_grupo',$grupos);
    }
}
