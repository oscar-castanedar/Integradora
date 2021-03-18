<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuarioController;
use App\Http\Controllers\Usuarios\PerfilController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
   return view('layouts.usuarios.unirse', ['usuario' => new Usuario()]);
   /*
   Usuario::create(
    ['nombre' => "Brayan"]
   );
   $usuario = Usuario::all();
   dd($usuario);

});*/


Route::get('/administrador', [App\Http\Controllers\Usuarios\AdminController::class, 'index'])->name('admin');
Route::get('/alumno',[App\Http\Controllers\Usuarios\AlumnoController::class,'index'])->name('alumno');
Route::get('/docente',[App\Http\Controllers\Usuarios\DocenteController::class,'index'])->name('docente');

Route::get('/recuperar-password', function () { //Ruta para la view de recuperar contraseña.
   return view('layouts.usuarios.email');
});

Route::group(['middleware' => 'auth'], function() {//Ruta para rutas globales que necesiten un inicio de sesión

   Route::get('mi-perfil', [App\Http\Controllers\Usuarios\PerfilController::class,'index']);
   Route::put('actualizar/{_id}', [App\Http\Controllers\Usuarios\PerfilController::class,'update'])->name('actualizar');

});


Auth::routes();//Rutas del auth que proporciona laravel

Route::resource('/', UsuarioController::class);//Ruta principal.
Route::resource('/home', UsuarioController::class);//Ruta principal (preventiba para el JetStream).
Route::post('login', [UsuarioController::class, 'login']);//Ruta para procesar el login.
Route::get('/register/verify/{code}', [UsuarioController::class, 'verify']);//Ruta para enviar el correo de confirmación de email.
Route::get('logout', [UsuarioController::class, 'logout']);//Ruta para  cerrar sesión.
Route::get('/verCurso/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'verCurso'])->name('verCurso');




