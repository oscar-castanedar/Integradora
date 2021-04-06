<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Tema;
use App\Models\Actividad;

class AlumnoController extends Controller
{
            /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloalumno',['only'=>'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($periodoSeleccionado = "")
    {       
            $cursos = Curso::where('nombre_periodo', $periodoSeleccionado)->get();
            $temas = Tema::all();
            $periodos = Periodo::all();
            $actividades = Actividad::all();
            $mis_cursos = Curso::all();

            return view('homeAlumno',compact('cursos', 'periodos','periodoSeleccionado', 'temas', 'actividades', 'mis_cursos'));
    }

    public function verCurso($id){
        $cursos=Curso::where('_id',$id)->get();
        return view('layouts.alumno.verCurso',compact('cursos'));
    }

    
}

