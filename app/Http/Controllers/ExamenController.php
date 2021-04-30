<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Examen;//importando el modelo de examen
use App\Models\Parcial;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Tema;
use Carbon\Carbon;
class ExamenController extends Controller
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

   
    

    /**
     * Store a newly created resource in storage.
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //Aqui creamos un nuevo Examen con los datos que se Extraen del Formulario
        $examen = new Examen([
            'idDocente' => $request->get('idDocente'),
            'idCurso' => $request->get('idCurso'),
            'idparcial' => $request->get('idparcial'),
            'num_parcial' => $request->get('numero_parcial'),
            'nombre_tema' => $request->get('nombre_tema'),
            'idparcial' => $request->get('idparcial'),
            'titulo' => $request->get('titulo'),
            'calificacion' => 0,
            'horaInicio' => Carbon::now()->toDateTimeString(),
            'horaFin' => Carbon::now()->toDateTimeString(),
            'intentos' => $request->get('intentos'),
            'fechaInicio' => $request->get('fechaInicio'),
            'fechaFin'  => $request->get('fechaFin'),
            'ponderacion' => $request->get('ponderacion'),
           
            ]); 

            $examen->save();


           
            return back()->with('success', 'Examen Creado Correctamente..');
           
       
    }

  

    /**
     * Esta funcion mandamos el id del examen y del curso para despues hacer una consulta de las datos del examen usando como,
     * parametros el id del examen y el id del curso comprobamos de que exista ese curso para extraer los datos 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,  $idc, $idparcial, $idperiodo)
    {
        //esta función nos manda a la vista editExam para poder iditar el examen. 
        $examenes=examen::where('_id',$id)->get();
        $cursos=Curso::where('_id',$idc)->get();
        $temas = Tema::where('id_parcial',$idparcial)->get();
        $parciales = Parcial::where('_id',$idparcial)->get();
        $periodos = Periodo::where('_id',$idperiodo)->get();
        $examen = examen::find($id);
        $cursos = curso::where('_id',$idc)->get();
        return view('layouts.docente.editExam',['singlExam'=>$examen ,'cursos'=>$cursos],compact('examenes', 'cursos','parciales','temas','periodos'));
    }

    

    /**
     * Remove the specified resource from storage.
     *Con esta funcion recibimos como parametros el id del examen para poder consultarlo y despues eleminarlo
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Delete($id)
    {
        //Aqui recibimos la id y para despues hacer una consulta para eleminarlo.
        $examen = examen::find($id);
         $examen->delete();

       
        return back()->with('success','Se Elemino satisfactoriamente');//retornamos que se elemino con exito.
        ;
    
    
    }
    //funion para actualizar el examen
    //Aquí recibimos todos los datos de las vista EditExamen para poder hacer la actualización.
    public function actualizar(Request $request)
    {
        //Aqui estraemos los datos de la pagina EditExamen para completar la edición.
        $examen = examen::find($request->id);
        $examen->titulo = $request->titulo;
        $examen->nombre_tema = $request->nombre_tema;
        $examen->fechaInicio = $request->fechaInicio;
        $examen->fechaFin = $request->fechaFin;
        $examen->ponderacion = $request->ponderacion;
        $examen->intentos = $request->intentos;
        
        $examen->save();


      
        return back()->with('success','Se editado satisfactoriamente');

     

    }

   
}
