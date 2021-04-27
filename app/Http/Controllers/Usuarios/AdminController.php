<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Grupo;
use App\Models\Institucion;
use App\Models\Carrera;
use App\Models\User;
use App\Models\Parcial;
use App\Models\Examen;
use App\Models\Curso;
use Session;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=>'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homeAdministrador');
    }

    
    //Generar Consultas para rendimiento marutino junto con el buscador
    public function rendimientoM(Request $request){
        $fcarrera = $request->get('buscarCarrera');
        $fcurso = $request->get('buscarporCurso');
        $fgrupo= $request->get('buscarporGrupo');
        $carrera=Carrera::carreras($fcarrera)->get();
        $curso=Curso::cursos($fcurso)->get();
        $grupo=Grupo::grupos($fgrupo)->where('turno','matutino')->get();
        $usuario=User::where('turno','matutino')->orWhere('status_usuario', '=','true')->get();
        $parcial1=Parcial::where('numero_parcial', 1)->get();
        $examen1=Examen::where('numero_parcial', 1)->get();
        $parcial2=Parcial::where('numero_parcial', 2)->get();
        $examen2=Examen::where('numero_parcial', 2)->get();
        $parcial3=Parcial::where('numero_parcial', 3)->get();
        $examen3=Examen::where('numero_parcial', 3)->get();
        return view('layouts.administrador.rendimientoMa',compact('carrera','usuario','grupo','curso','examen1','parcial1','examen2','parcial2','examen3','parcial3'));
    }
    //generar pdf para las consultas del turno matutino
    public function pdfM(Request $request){
        $fcarrera = $request->get('buscarCarrera');
        $fcurso = $request->get('buscarporCurso');
        $fgrupo= $request->get('buscarporGrupo');
        $carrera=Carrera::carreras($fcarrera)->get();
        $curso=Curso::cursos($fcurso)->get();
        $grupo=Grupo::grupos($fgrupo)->where('turno','matutino')->get();
        $usuario=User::where('turno','matutino')->orWhere('status_usuario', '=','true')->get();
        $parcial1=Parcial::where('numero_parcial', 1)->get();
        $examen1=Examen::where('numero_parcial', 1)->get();
        $parcial2=Parcial::where('numero_parcial', 2)->get();
        $examen2=Examen::where('numero_parcial', 2)->get();
        $parcial3=Parcial::where('numero_parcial', 3)->get();
        $examen3=Examen::where('numero_parcial', 3)->get();
        $pdf=\PDF::loadView('layouts.administrador.rendimientoMaPDF',compact('carrera','usuario','grupo','curso','examen1','parcial1','examen2','parcial2','examen3','parcial3'));
        return $pdf->setPaper('a4', 'landscape')->stream('RendimientoVespertino.pdf');
    }
    //Generar consultas para el turno vespertino
    public function rendimientoV(Request $request){
        $fcarrera = $request->get('buscarCarrera');
        $fcurso = $request->get('buscarporCurso');
        $fgrupo= $request->get('buscarporGrupo');
        $carrera=Carrera::carreras($fcarrera)->get();
        $curso=Curso::cursos($fcurso)->get();
        $grupo=Grupo::grupos($fgrupo)->where('turno','vespertino')->get();
        $usuario=User::where('turno','vespertino')->orWhere('status_usuario', '=','true')->get();
        $parcial1=Parcial::where('numero_parcial', 1)->get();
        $examen1=Examen::where('numero_parcial', 1)->get();
        $parcial2=Parcial::where('numero_parcial', 2)->get();
        $examen2=Examen::where('numero_parcial', 2)->get();
        $parcial3=Parcial::where('numero_parcial', 3)->get();
        $examen3=Examen::where('numero_parcial', 3)->get();
        return view('layouts.administrador.rendimientoVe',compact('carrera','usuario','grupo','curso','examen1','parcial1','examen2','parcial2','examen3','parcial3'));
    }
    //generar pdf para las consultas del turno Vespertino
    public function pdfV(Request $request){
        $fcarrera = $request->get('buscarCarrera');
        $fcurso = $request->get('buscarporCurso');
        $fgrupo= $request->get('buscarporGrupo');
        $carrera=Carrera::carreras($fcarrera)->get();
        $curso=Curso::cursos($fcurso)->get();
        $grupo=Grupo::grupos($fgrupo)->where('turno','vespertino')->get();
        $usuario=User::where('turno','vespertino')->orWhere('status_usuario', '=','true')->get();
        $parcial1=Parcial::where('numero_parcial', 1)->get();
        $examen1=Examen::where('numero_parcial', 1)->get();
        $parcial2=Parcial::where('numero_parcial', 2)->get();
        $examen2=Examen::where('numero_parcial', 2)->get();
        $parcial3=Parcial::where('numero_parcial', 3)->get();
        $examen3=Examen::where('numero_parcial', 3)->get();
        $pdf=\PDF::loadView('layouts.administrador.rendimientoVePDF',compact('carrera','usuario','grupo','curso','examen1','parcial1','examen2','parcial2','examen3','parcial3'));
        return $pdf->setPaper('a4', 'landscape')->stream('RendimientoVespertino.pdf');
    }
    ///////////
    //Funncion para consultar y mostar los datos en lista 
    public function perfil(){
        $usuario = User::where('rol','estudiante')->get();
        return view('layouts.administrador.perfil',['listaAlumnos'=>$usuario]);
    }
    
    //Funcion para actualizacion  de datos a la coleccion 
    public function editperfil($id){
        $ins=Institucion::all();
        $usuario=User::find($id);
        return view('layouts.administrador.editperfil', compact('usuario','ins'));
    }
    public function update (Request $request ,$id){
        $ins=Institucion::all();
        $usuario=User::find($id);  
        $usuario->nombre=$request->nombre;
        $usuario->primer_apellido=$request->primer_apellido;
        $usuario->segundo_apellido=$request->segundo_apellido;
        $usuario->email=$request->email;
        $usuario->institucion=$request->institucion;
        $usuario->semestre=$request->semestre; 
        //Guarda los datos modificados 
        $usuario->save();
        //Consulta con filtros para volver a a cargar 
        $usuario = User::where('rol','estudiante')->get();
        //Returno de la vista con los datos actualizasdos 
        return view('layouts.administrador.perfil',['listaAlumnos'=>$usuario,'in'=>$ins]);
    }


//////////////////
}
