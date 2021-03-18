<?php

namespace App\Models; 

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Descripcion: Administrador de Asignatura
 * Autor: Eduardo Galindo Arellano  
 * Fecha: 17/03/2021
 */
 class Asignatura extends Eloquent{
     protected $connection = 'mongodb';
     protected $collection = 'Asignatura';

     /**
      * The attributes that are mass assigmable.
      *
      * @var array
      */

      protected $fillable = [
          'carrera',
          'tipo',
          'horas_semana',
          'semestre',
          'descripcion',
          'temario',
          'nombre_Asignatura',
          'competencias'
      ];

 }
