<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Autor: Brayan Mares Bueno
     * Descripcion: Modelo para registrar usuarios.
     * Fecha: 17-03-2021
     * @var array
     */
    protected $collection = 'usuarios';
    protected $primaryKey = '_id';
    protected $fillable = [
        '_id',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
        'nivel_educativo',
        'institucion',
        'rol',
        'semestre',
        'turno',
        'status_usuario',
        'confirmado',
        'codigo_confirmacion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}