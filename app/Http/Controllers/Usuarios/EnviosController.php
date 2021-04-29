<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Tema;
use App\Models\Examen;
use App\Models\Parcial;
use App\Models\Actividad;
use App\Models\Grupo;
use App\Models\Lista;
use App\Models\Token;
use App\Models\User;
use App\Models\Notificacion;
use App\Models\AvanceCurso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Asignatura;
use App\Models\avance_curso;
use App\Models\Recursos;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class EnviosController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solodocente',['only'=>'index','create','show','todo']);
    }

    public function enviarN(Curso $id){//Funcion para cargar vista de notificacion
        $user = User::find(Auth::user()->_id);
        $curso = Curso::find($id);
        $grupos = Grupo::all();
        $userA = User::all();
        foreach ($grupos as $gru) {//Recorrer los todos los grupos
            foreach ($curso as $cur){
                foreach ($cur->grupos as $curs){//Recorrer los grupos del curso
                    if($curs == $gru->nombre_grupo){//Condicion para comparar los grupos del curso con los grupos 
                      if ($curso) {
                        $idG = $gru->id;//variable para guardar el id del grupo
                        $grupo = Grupo::find($idG);//consultar el grupo
                        $grupoo = $grupo->nombre_grupo;//guardar los nombres del grupo
                        return view('layouts.docente.notificacionE', compact('user','curso','grupos','userA','grupoo'));
                        }else{
                            return view('welcome');
                        }
                    }
                }
            }
        }
    }

    public function enviar(Request $request, User $id, Curso $idC, Grupo $idG){//Funcion para enviar notificaciones 
        $user = User::find($id);
        $curso = Curso::find($idC);
        $grupos = Grupo::all();
        $userA = User::all();
        
        foreach ($grupos as $gru) {//Recorrer los todos los grupos
            foreach ($curso as $cur){//Recorrer los cursos
                foreach ($cur->grupos as $curs){//Recorrer los grupos dl curso
                    if($gru->nombre_grupo == $curs){//Condicion para comparar los grupos con los grupos del curso
                        if ($request) {
                            $date = Carbon::now();
                            $date = $date->format('d-m-Y');
                            $mensaje = $request['asunto'];
                            $emails = $request['emails'];
                            Notificacion::create([//Crear notificacion
                                'docente' => Auth::user()->nombre ,
                                'asunto' =>  $request['asunto'],
                                'fecha_envio' => $date,
                                'status_notificacion' => 'false',
                                'usuarios' => $request['emails'],         
                            ]);
                            Mail::send('emails.notificacion', ['mensaje' => $mensaje ], function ($message) use ($request) {
                            $message->to($request['emails'])->subject('Nueva notificacion');});//Funcion para enviar norificacion
                            return back()->with('success', 'Notificacion enviada correctamente');
                        }else{
                            return back()->with('error', 'Notificacion no enviada');
                        }
                    }
                }
            }
        }
    }
        

    public function enviarF(Curso $id){//Funcion para cargar vista para generar token 
        $user = User::find(Auth::user()->_id);
        $curso = Curso::find($id);
        $grupos = Grupo::all();
        $userA = User::all();
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $a = Auth::user()->email;
        $lista = Token::where('fecha','=',$date)->get();
        $token = "";
        foreach ($grupos as $gru) {//Recorrer los todos los grupos
            foreach ($curso as $cur){//Recorrer los cursos
                foreach ($cur->grupos as $curs){//Recorrer los grupos dl curso
                    if($curs == $gru->nombre_grupo){//Condicion para comparar los grupos con los grupos del curso
                        if ($curso) {
                            $idG = $gru->id;
                            $grupo = Grupo::find($idG);
                            $grupoo = $grupo->nombre_grupo;
                            $date = Carbon::now();
                            $date = $date->format('d-m-Y');
                            return view('layouts.docente.formulario', compact('user','curso','grupos','userA','grupoo','token','date','lista'))->with('success','Actualizado');
                        }else{
                            return view('welcome');
                        }
                    }
                }
            }
        }
    }

    public function generarT(Request $request, User $id, Curso $idC, Grupo $idG) {//Funcion para generar token 
      $curso = Curso::find($idC);
      $grupos = Grupo::all();
      $userA = User::all();
      $date = Carbon::now();
      $date = $date->format('d-m-Y');
      $a = Auth::user()->email;
      $lista = Token::where('fecha','=',$date)->get();
      $request['codigo_confirmacion'] = Str::random(25);
      $token = $request['codigo_confirmacion'];

    foreach ($grupos as $gru) {//Recorrer los todos los grupos
        foreach ($curso as $cur){//Recorrer los cursos
            foreach ($cur->grupos as $curs){//Recorrer los grupos dl curso
                if($curs == $gru->nombre_grupo){//Condicion para comparar los grupos con los grupos del curso
                    if ($lista) {
                        $idG = $gru->id;
                        $grupo = Grupo::find($idG)->first();
                        $grupoo = $grupo->nombre_grupo;
                        $date = Carbon::now();
                        $date = $date->format('d-m-Y');
                        $hora = Carbon::now();
                        $hora = $hora->isoFormat('h:mm:ss a');
                        $hora1 = Carbon::now()->addHours(1);
                        $hora1 = $hora1->isoFormat('h:mm:ss a');
                        Token::create([//crear token
                            'docente' => $a,
                            'token' => $token,
                            'fecha' => $date,
                            'hora' => $hora,
                            'hora_limite' => $hora1,
                            'curso' => $cur->nombre_curso
                        ]);
                            return view('layouts.docente.formulario', compact('curso','grupos','userA','grupoo','token','lista','date'))->with('error', 'Las contraseñas no son iguales');
                        }else{
                            return view('layouts.docente.usuario', compact('user','curso','grupos','userA'))->with('error', 'Las contraseñas no son iguales');
                        }
                    }
                }
            }
        }
    }    


    public function generarL(Request $request, User $id, Curso $idC, Grupo $idG) {//Funcion para ver lista de alumnos
        $user = User::find($id);
        $curso = Curso::find($idC);
        $userA = User::all();
        $lista = Lista::all();
        $a = Auth::user()->email;
        foreach ($curso as $cur1) {//Recorre el curso 
            $token = Token::where('curso','=',$cur1->nombre_curso)->get(); //consulta para verificar si el curos del token es igual al curso 
            if ($token) {//verificar si se genero correctamente la consulta
                $date = Carbon::now();
                $date = $date->format('d-m-Y');
                return view('layouts.docente.lista', compact('user','curso','userA','lista','token','date'))->with('success', 'Las contraseñas no son iguales');
            }else{
                return view('layouts.docente.usuario', compact('user','curso','grupos','userA'))->with('error', 'Las contraseñas no son iguales');
            }
        }
    } 
}