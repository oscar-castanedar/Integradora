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
     * Descripcion: Modelo para registrar a los participantes.
     * Funcionalidad: Registrar en la base de datos a los usuaros.
     * Fecha: 17-03-2021
     * @var array
     */
    
    /**
     * Autor: Jorge Etzel Perez Magallon
     * Descripcion: Modelo para ingresar con sus datos registrados.
     * Funcionalidad: Validar la sesion con la base de datos del sistema
     * Fecha: 18-03-2021
     * Nota:Se habian agregado anteriormente pero se borro.
     */
    /**
     * Autor: Marin Reyes Saul Guadalupe
     * Descripcion: Modelo para recuperar contraseña.
     * Funcionalidad: Recupera la contraseña de un usuario existente en la base de datos
     * Fecha: 19-03-2021
     * Nota:Se habian agregado anteriormente pero se borro.
     */
    /**
     * Autor: Zárate Rivera Ángela Alejandra
     * Descripcion: Modelo para consultar el nombre y estatus del usuario.
     * Funcionalidad: Consultar el nombre y cambiar el estatus de los usarios.
     * Fecha: 19-03-2021
     * Nota: Ya lo había agregado, pero fue eliminado.
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
