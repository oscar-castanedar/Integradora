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

class DocenteController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($periodoSeleccionado = null)
    {       
      $cursos = Curso::where('nombre_periodo', $periodoSeleccionado)->get();
            $temas = Tema::all();
            $periodos = Periodo::all();
            $actividades = Actividad::all();
            $mis_cursos = Curso::all();
            $asignatura = Asignatura::all();
            $grupos= Grupo::all();

            

            return view('homeDocente',compact('cursos', 'periodos','periodoSeleccionado', 'temas', 'actividades', 'mis_cursos','asignatura','grupos' ));
    }

    public function verCurso($id){
        $cursos=Curso::where('_id',$id)->get();
        return view('layouts.alumno.verCurso',compact('cursos'));
    }

    public function updateStatus(Request $request){
        $cursos=Curso::findOrFail($request->_id);
        $cursos->status_curso =$request->status_curso;
        $cursos->save();

        return response()->json(['succes'=>'estatus cambiado']);


    }
    
    public function statuscurso($id){
        $cursos = Curso::find($id);
        $cursos->status_curso = false;
        $cursos->save();

        return redirect('/docente')
                        ->with('message','Actualizado');
    }

    public function statuscurso1($id){
        $cursos = Curso::find($id);
        $cursos->status_curso = true;
        $cursos->save();

        return redirect('/docente')
                        ->with('message','Actualizado');
    }

      //examen 

      public function crearExam()
      {
          
        
         $singlExam = "singleExam";
         $examenes = examen::all();
         
         $parciales = parcial::all();
           
          return view('layouts.docente.examen', ['allExam' => $examenes],compact('parciales'));//retornando a la vista de examen
      }


      
      public function crearCurso(Request $request, $idperiodo){
        $prueba = "";
        $curso=$request['nombre_curso'];
        $consulta = Grupo::all();
        $asig = Asignatura::all();
        $temas = Tema::all();
        $periodo=Periodo::where('_id',$idperiodo)->get();//aqui lo de parcial

      
            
                $cursoNew = new Curso([
                  'nombre_curso' =>  $request['nombre_curso'],
                  'asignatura'   =>  $request['asignatura'],
                  'nombre_periodo' =>  $request['nombre_periodo'],
                  'periodo'      =>  $request['periodo'],
                  'grupos'        =>  $request['grupos'],
                  'descripcion_curso'  =>  $request['descripcion_curso'],
                  'autor_curso' =>  $request['autor_curso'],
                  'resumen_curso'=>  $request['resumen_curso'],
                  
                ]);

                $cursoNew->save();

            $temas = Tema::all();
            $cursos=Curso::find($cursoNew);
            $parciales = Parcial::where('id_curso',$prueba);
            //$parcials = Parcial::all();
            //$consulta2 = Examen::all();

              //retornar vista
              return view('layouts.docente.parcial',['grupos'=>$consulta,'asignatura'=>$asig, 
              'temas'=>$temas,'cursos'=>$cursos, 'periodos'=> $periodo, 'parciales'=> $parciales]);
        

    }

    public function vistaExam($id, $idP, $idparcial)//esta función nos manda a la vista del examen incluyendo los datos del Curso recibiendo el id que mandamos desde la vista de parciales
    {
        //
        $cursos=Curso::where('_id',$id)->get();//Aqui extraemos el id del curso y para extraer sus datos pasarlos a examen
        $singlExam = "singleExam";
        $examenes = Examen::where('idparcial',$idparcial)->get();//aqui extraemos los datos del examen
        
        $periodos=Periodo::where('_id',$idP)->get();//aqui lo de parcial
        $temas = Tema::where('id_parcial',$idparcial)->get();
        $parciales = Parcial::where('_id',$idparcial)->get();
        return view('layouts.docente.examen',compact('cursos','temas', 'examenes', 'periodos', 'parciales'));//Aqui regresamos la vista del examen y compactamos todos los datos de las colecciones consultadas

    }

    public function regresoParcial($id, $idP)//esta función nos regresa a la pagina de los parciales con todos los datos necesarios.
    {
        //
        $cursos=Curso::where('_id',$id)->get();
        $parciales=Parcial::where('id_curso',$id)->get();
        $consulta = Grupo::all();
        $asig = Asignatura::all();
        $temas = Tema::all();
        $periodos=Periodo::where('_id',$idP)->get();//aqui lo de parcial
        
        $temas = tema::all();
        return view('layouts.docente.parcial',['grupos'=>$consulta,'asignatura'=>$asig, 
        'temas'=>$temas,'cursos'=>$cursos, 'periodos'=>$periodos, 'parciales'=>$parciales]);
    }

    public function periodo()//esta función nos regresa a la pagina de los parciales con todos los datos necesarios.
    {
        //
       
        return view('layouts.docente.parcial'); 
    }

    
    public function crearParcial(Request $request, $idc, $idperiodo){

      
      $cursos=Curso::where('_id',$idc)->get();
      $periodos=Periodo::where('_id',$idperiodo)->get();
          $consulta = Grupo::all();
          $asig = Asignatura::all();
          $temas = Tema::all();
            

      
          
              $parcial = new Parcial([
                'numero_parcial'  => $request->get('numero_parcial'),
                'nombre_parcial'     => $request->get('nom_parcial'),
                'repaso'           => $request->get('repaso'),
                'id_curso'         => $request->get('id_curso'),
                'nombre_curso'     => $request->get('nombre_curso'),
               
                
              ]);

         $parcial -> save();
         $parciales = Parcial::where('id_curso',$idc)->get();

         return view('layouts.docente.parcial',['grupos'=>$consulta,'asignatura'=>$asig, 
         'temas'=>$temas,'cursos'=>$cursos, 'periodos'=>$periodos, 'parciales'=>$parciales]);

            
      

  }

  //direcionar a la vista de tema
  public function vistaTema($idc, $idperiodo, $idparcial) 
  {
      //el idc lo acabas de poner? en la vita?
      $cursos=Curso::where('_id',$idc)->get();
      $parciales=Parcial::where('_id',$idparcial)->get();
      $periodos=Periodo::where('_id',$idperiodo)->get();
      
      return view('layouts.docente.tema',compact('parciales', 'cursos', 'periodos'));
  }


  //en esta funcion sirve para crear los temas que extraemos los valores desde las vista de tema
  
  public function crearTema(Request $request){

    
    $tema = new Tema([
      'nombre_tema'        => $request->get('nom_tema'),
      'descripcion'     => $request->get('descripcion'),
      'id_curso'        => $request->get('id_curso'),
      'id_parcial'     => $request->get('id_parcial'),
     
      
    ]);

    $tema -> save();

    return back()->with('success', 'Tema Agregado');

  }


    //editar curso 
    public function editarCurso($id){
      $usuario=Auth::user()->_id;
      $consulta=AvanceCurso::where('id_curso','=',$id)->where('id_docente','=',$usuario)->first();
      $date = Carbon::now();
      $date = $date->toDateTimeString();
      $pocentajes=0;
      if($consulta){
          $consulta->ultima_visita=$date;
          $consulta->save();
      }else{
          AvanceCurso::create([
               'progreso'=>$pocentajes,
               'ultima_visita'=>$date,
               'id_alumno'=>$usuario,
               'id_curso'=>$id,
          ]);
      }

      $parcial=Tema::where('id_curso','=',$id)->where('id_parcial','=',1)->get();
      $parcial2=Tema::where('id_curso','=',$id)->where('id_parcial','=',2)->get();
      $parcial3=Tema::where('id_curso','=',$id)->where('id_parcial','=',3)->get();
      $parc=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',1)->get();
      $parc1=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',2)->get();
      $parc2=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',3)->get();
      $uno = AvanceCurso::where('id_curso','=',$id)->where('id_alumno','=',$usuario)->get();
      $cursos=Curso::all()->where('_id',$id);
      return view('layouts.docente.editarCurso',['cursos'=>$cursos,'uno'=>$uno,'tema'=>$parcial,'tema2'=>$parcial2,'tema3'=>$parcial3,'parcial'=>$parc,'parcial1'=>$parc1,'parcial2'=>$parc2]);
  }

}
