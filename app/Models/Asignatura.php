<?php

namespace App\Models; 

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Descripcion: Adminiistrador de Aginatura
 * Autor: Eduardo Galindo Arellano  
 * Fecha: 17/03/2021
 */

 class Asignatura extends Eloquent{
     protected $connection = 'mongodb';
     protected $collection = 'asignatura';

     /**
      * The attributes that are mass assigmable.
      *
      * @var array
      */

      protected $fillable = [
          'carrera',
          'horas',
          'semestre',
          'descripcion',
          'temario',
          'nombre_Asig',
          'competencias'
      ];

 }