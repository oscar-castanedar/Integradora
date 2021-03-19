<?php

namespace App\Models; 

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * Descripcion: Administrador de Asignatura
 * Autor: Eduardo Galindo Arellano  
 * Fecha: 17/03/2021
 * Descripción: Vizualizar el curso con su asignatura correspondiente o poder modificarla.
* Funcionalidad: Ver y / o editar el curso, una vez que este ya haya sido creado.
* Autor: Cabello Salas Juan Carlos.
* Fecha: 19/03/2020
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
          'tipo',
          'horas_semana',
          'semestre',
          'descripcion',
          'temario',
          'nombre_Asignatura',
          'competencias'
      ];

 }
