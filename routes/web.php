<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\UsuarioController;
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
Route::get('/alumno/{nombre_periodo?}',[App\Http\Controllers\Usuarios\AlumnoController::class,'index'])->name('alumno');
Route::get('/docente',[App\Http\Controllers\Usuarios\DocenteController::class,'index'])->name('docente');
Route::get('/docente/{nombre_periodo?}',[App\Http\Controllers\Usuarios\DocenteController::class,'index'])->name('docente');

Route::get('/recuperar-password', function () { //Ruta para la view de recuperar contraseña.
   return view('layouts.usuarios.email');
});

//Rutas para administrador
Route::group(['middleware' => 'solodocente'], function() {

});

Route::group(['middleware' => 'auth'], function() {//Ruta para rutas globales que necesiten un inicio de sesión
   //Mi perfil
   Route::get('mi-perfil', [App\Http\Controllers\Usuarios\PerfilController::class,'index']);
   Route::put('actualizar/{_id}', [App\Http\Controllers\Usuarios\PerfilController::class,'update'])->name('actualizar');
   Route::get('/pdf/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'PDF'])->name('pdf');
});


Auth::routes([
'login' => false, 
'logout' => false,
'register' => false]);//Usando rutas del Auth, para cambiar contraseña, evitando las rutas que no se ncesiten.

Route::resource('/', UsuarioController::class);//Ruta principal.
Route::resource('/home', UsuarioController::class);//Ruta principal (preventiba para el JetStream).
Route::post('login', [UsuarioController::class, 'login']);//Ruta para procesar el login.
Route::get('/register/verify/{code}', [UsuarioController::class, 'verify']);//Ruta para enviar el correo de confirmación de email.
Route::get('logout', [UsuarioController::class, 'logout']);//Ruta para  cerrar sesión.
Route::get('/verCurso/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'verCurso'])->name('verCurso');
Route::get('/verCurso/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'verCurso'])->name('verCurso');
Route::get('/entregarActividad/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'entregarActividad'])->name('entregarActividad');
Route::post('/entregarActividad2',[App\Http\Controllers\Usuarios\AlumnoController::class,'entregarActividad2'])->name('entregarActividad2');

//Rutas Administrador
//Rutas para Generar pdf de calificaciones matutino y vespertino
Route::get('rendimientoM',[App\Http\Controllers\Usuarios\AdminController::class,'rendimientoM'])->name('rendimientoM');
Route::get('pdfM',[App\Http\Controllers\Usuarios\AdminController::class,'pdfM'])->name('pdfM');
Route::get('rendimientoV',[App\Http\Controllers\Usuarios\AdminController::class,'rendimientoV'])->name('rendimientoV');
Route::get('pdfV',[App\Http\Controllers\Usuarios\AdminController::class,'pdfV'])->name('pdfV');

Route::get('perfil',[App\Http\Controllers\Usuarios\AdminController::class,'perfil'])->name('perfil');
Route::get('/perfil/{id}/edit',[App\Http\Controllers\Usuarios\AdminController::class, 'editperfil'])->name('editperfil');
Route::put('/perfil/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'update'])->name('update');

//Rutas para Docentes
//Rutas para notificacion y token de lista
Route::get('enviarNotificacion/{id}',[App\Http\Controllers\Usuarios\EnviosController::class,'enviarN'])->name('enviarNotificacion');//Ruta para cargar vista de envio de notificaciones
Route::get('enviarFormulario/{id}',[App\Http\Controllers\Usuarios\EnviosController::class,'enviarF'])->name('enviarFormulario');//Ruta para cargar vista de envio pase lista
Route::post('token/{id}/{idC}/{idG}',[App\Http\Controllers\Usuarios\EnviosController::class,'generarT'])->name('token');
Route::get('tokenB/{id}/{idC}/{idG}',[App\Http\Controllers\Usuarios\EnviosController::class,'borrarT'])->name('tokenB');
Route::get('lista/{id}/{idC}/{idG}',[App\Http\Controllers\Usuarios\EnviosController::class,'generarL'])->name('lista');
Route::get('lis/{id}/{idC}/{idG}',[App\Http\Controllers\Usuarios\DocenteController::class,'generarU'])->name('lis');
Route::post('crearNotificacion/{id}/{idC}/{idG}',[App\Http\Controllers\Usuarios\EnviosController::class,'enviar'])->name('crearNotificacion');
Route::get('/asistencia/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'asistenciaa'])->name('asistencia');
Route::post('/asistencia/{id}',[App\Http\Controllers\Usuarios\AlumnoController::class,'asistenciaR'])->name('asistencia');

//rutas para crear curso
Route::get('/Curso',[App\Http\Controllers\Usuarios\DocenteController::class, 'Curso'])->name('Curso');
Route::get('/agregarContenido',[App\Http\Controllers\Usuarios\DocenteController::class, 'agregarContenido'])->name('agregarContenido');
Route::get('/agregarActividad',[App\Http\Controllers\Usuarios\DocenteController::class, 'agregarActividad'])->name('agregarActividad');
Route::get('/agregarExTr',[App\Http\Controllers\Usuarios\DocenteController::class, 'agregarExTr'])->name('agregarExTr');
Route::post('/crearCurso',[App\Http\Controllers\Usuarios\DocenteController::class, 'crearCurso'])->name('crearCurso');

Route::get('/crearExam/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'prueba1'])->name('crearExam');
Route::get('/regreso/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'regreso'])->name('/regreso');

//rutas para editar el curso
Route::get('/editarCurso/{id}',[App\Http\Controllers\Usuarios\DocenteController::class,'editarCurso'])->name('editarCurso');

//rutas del examen
Route::get('/examen/{idc}', [App\Http\Controllers\ExamenController::class,'index2'])->name('/examen');
Route::get('/examen3', [App\Http\Controllers\ExamenController::class,'index'])->name('/examen');
Route::post('/examenR', [App\Http\Controllers\ExamenController::class,'actu']);
Route::get('/delete/{id}',[App\Http\Controllers\ExamenController::class,'Delete']);
Route::get('/update/{id}/{idc}', [App\Http\Controllers\ExamenController::class,'edit']);
Route::post('/crearExam', [App\Http\Controllers\ExamenController::class,'store']);

//rutas de preguntas
Route::post('/preguntas/{id}', [App\Http\Controllers\PreguntaController::class,'store']);
Route::post('/preguntasl/{id}', [App\Http\Controllers\ExamenController::class,'capturar']);
Route::get('/preguntaR/{id}/{idc}', [App\Http\Controllers\PreguntaController::class,'prueba']);
Route::get('/pregunta',[App\Http\Controllers\PreguntaController::class,'index']);


//
Route::get('/status/update', [DocenteController::class, 'updateStatus'])->name('users.update.status');
Route::get('/status-curso/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'statuscurso'])->name('status-curso');
Route::get('/status-curso1/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'statuscurso1'])->name('status-curso1');

