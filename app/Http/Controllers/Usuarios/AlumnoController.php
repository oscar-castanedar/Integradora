<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Curso;

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
    public function index()
    { 
            $cursos=Curso::all();
            return view('homeAlumno',compact('cursos'));
    }

    public function verCurso($id){
        $cursos=Curso::where('_id',$id)->get();
        return view('layouts.alumno.verCurso',compact('cursos'));
    }
}
