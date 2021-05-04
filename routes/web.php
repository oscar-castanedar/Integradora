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
Route::post('/crearCurso/{idperiodo}',[App\Http\Controllers\Usuarios\DocenteController::class, 'crearCurso'])->name('crearCurso');

Route::get('/vistaExam/{id}/{idP}/{idparcial}',[App\Http\Controllers\Usuarios\DocenteController::class, 'vistaExam'])->name('vistaExam');//CON ESTA RUTA MANDAMOS A LA VISTA PRINCIPAL DEL EXAMEN INCLUYENDO EL ID DEL CURSO
Route::get('/regreso/{id}/{idP}',[App\Http\Controllers\Usuarios\DocenteController::class, 'regresoParcial'])->name('/regreso');

//rutas para editar el curso
Route::get('/editarCurso/{id}',[App\Http\Controllers\Usuarios\DocenteController::class,'editarCurso'])->name('editarCurso');

//rutas del examen

Route::post('/examenR', [App\Http\Controllers\ExamenController::class,'actualizar']);//esta ruta nos manda a la funcion de actualizar 
Route::get('/delete/{id}',[App\Http\Controllers\ExamenController::class,'Delete']);//esta ruts nos manda una funcion llamada delete 
Route::get('/update/{id}/{idc}/{idparcial}/{idperiodo}', [App\Http\Controllers\ExamenController::class,'edit']);//ruta para editar examen
Route::post('/crearExam', [App\Http\Controllers\ExamenController::class,'store']);//ruta para crear Examen

//rutas de preguntas
Route::post('/crearPreguntas', [App\Http\Controllers\PreguntaController::class,'store']);//esta nos manda a la funcion de crear preguntas.
Route::get('/agregarPregu/{id}/{idc}/{idparcial}/{idperiodo}', [App\Http\Controllers\PreguntaController::class,'agregarPre']);//esta ruta nos manda a la página de pregunta
Route::get('/regresoExam/{idc}/{idperiodo}/{idparcial}', [App\Http\Controllers\PreguntaController::class,'regresoExam']);

//parcial
Route::get('/periodo',[App\Http\Controllers\Usuarios\DocenteController::class, 'periodo'])->name('/periodo');
Route::post('/crearParcial/{idc}/{idperiodo}',[App\Http\Controllers\Usuarios\DocenteController::class, 'crearParcial'])->name('/crearParcial');


//tema
Route::get('/vistaTema/{idc}/{idperiodo}/{idparcial}',[App\Http\Controllers\Usuarios\DocenteController::class, 'vistaTema'])->name('/vistaTema');
Route::post('/crearTema',[App\Http\Controllers\Usuarios\DocenteController::class, 'creartema'])->name('/crearTema');


//
Route::get('/status/update', [DocenteController::class, 'updateStatus'])->name('users.update.status');
Route::get('/status-curso/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'statuscurso'])->name('status-curso');
Route::get('/status-curso1/{id}',[App\Http\Controllers\Usuarios\DocenteController::class, 'statuscurso1'])->name('status-curso1');

//rutas para periodos y sus acciones
Route::get('/periodo',[App\Http\Controllers\Usuarios\AdminController::class,'periodo'])->name('periodo');
Route::post('/periodo/savePeriodo',[App\Http\Controllers\Usuarios\AdminController::class, 'savePeriodo'])->name('savePeriodo');
Route::get('/editPeriodo/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'edit'])->name('editPeriodo');
Route::post('/updatePeriodo/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'updatePeriodo'])->name('updatePeriodo');
Route::get('/status-update/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'statusupdate'])->name('status-update');
Route::get('/status-update1/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'statusupdate1'])->name('status-update1');
Route::get('/deletePeriodo/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'delete'])->name('deletePeriodo');


//rutas para carreras y sus acciones
Route::get('/carreras',[App\Http\Controllers\Usuarios\AdminController::class,'carreras'])->name('carreras');
Route::post('/carreras/saveCarrera',[App\Http\Controllers\Usuarios\AdminController::class, 'saveCarrera'])->name('saveCarrera');
Route::get('/editCarreras/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'edit3'])->name('editCarreras');
Route::post('/updateCarreras/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'updateCarreras'])->name('updateCarreras');
Route::get('/deleteCarreras/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'delete3'])->name('deleteCarreras');


//rutas para instituciones y sus acciones
Route::get('/instituciones',[App\Http\Controllers\Usuarios\AdminController::class,'instituciones'])->name('instituciones');
Route::post('/instituciones/saveInstitucion',[App\Http\Controllers\Usuarios\AdminController::class, 'saveInstitucion'])->name('saveInstitucion');
Route::get('/editInstitucion/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'edit2'])->name('editInstitucion');
Route::post('/updateInstitucion/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'updateInstitucion'])->name('updateInstitucion');
Route::get('/deleteInstitucion/{id}',[App\Http\Controllers\Usuarios\AdminController::class, 'delete2'])->name('deleteInstitucion');


//rutas para participantes
Route::get('/participantes',[App\Http\Controllers\Usuarios\AdminController::class,'participantes'])->name('participantes');