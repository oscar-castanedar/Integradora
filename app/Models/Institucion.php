<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Institucion extends Eloquent
{
    use HasFactory;
    /**
     * Autor: Brayan Mares Bueno
     * Descripcion: Modelo que enlista la instituciones para el registro del participante.
     * Fecha: 17-03-2021
     * @var array
     */
    protected $connection = 'mongodb';
    protected $collection = 'institucion';
    protected $fillable = [
        'nombre_institucion',
        'cct',
        'nombre_director',
        'telefono',
        'domicilio'
    ];

}
