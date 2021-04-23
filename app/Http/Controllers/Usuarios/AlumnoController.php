<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Grupo;
use App\Models\Periodo;
use App\Models\Tema;
use App\Models\Parcial;
use App\Models\Actividad;
use App\Models\AvanceCurso;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    public function index($periodoSeleccionado = null)
    {       
            $cursos = Curso::where('nombre_periodo', $periodoSeleccionado)->paginate(4);
            $grupos = Grupo::all();
            $temas = Tema::all();
            $periodos = Periodo::all();
            $actividades = Actividad::all();
            $avance_curso = AvanceCurso::all();
            $mis_cursos = Curso::all();
            
            $usuario=Auth::user()->_id;
            $consulta=AvanceCurso::where('id_alumno','=',$usuario)->first();

            return view('homeAlumno',compact('cursos', 'periodos','periodoSeleccionado', 'temas', 'actividades', 'mis_cursos', 'avance_curso', 'grupos', 'consulta'));
    }

    public function verCurso($id){
        $usuario=Auth::user()->_id;
        $consulta=AvanceCurso::where('id_curso','=',$id)->where('id_alumno','=',$usuario)->first();
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
        //Se hace una consulta a cada uno de los parciales de cada curso
        $parc=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',1)->get();
        $parc1=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',2)->get();
        $parc2=Parcial::where('id_curso','=',$id)->where('numero_parcial','=',3)->get();
        $uno = AvanceCurso::where('id_curso','=',$id)->where('id_alumno','=',$usuario)->get();
        $cursos=Curso::all()->where('_id',$id);
        return view('layouts.alumno.verCurso',['cursos'=>$cursos,'uno'=>$uno,'tema'=>$parcial,'tema2'=>$parcial2,'tema3'=>$parcial3,'parcial'=>$parc,'parcial1'=>$parc1,'parcial2'=>$parc2]);
    }

    public function entregarActividad($id){
        $alumno=Auth::user()->id;
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        $actividad=Actividad::where('id_tema','=',$id)->where('alumnos.id_alumno','=',$alumno)->first();
        if(!$actividad){
            $actt=Actividad::where('id_tema','=',$id)->first();
            $actt->push('alumnos', [
                'id_alumno'=>$alumno,
                'status_calificacion'=>'No calificado',
                'status_entrega'=>'No entregado',
                'calificacion'=>'null',
                'link_archivo'=>'null',
                'comentario'=>'Sin comentarios',
                'modificacion'=>'null'
            ]);
        }

        $acti=Actividad::where('id_tema','=',$id)->where('alumnos.id_alumno','=',$alumno)->first();
        $indexAlumno = 0; 

        for( $i= 0 ; $i < count($acti->alumnos) ; $i++ ){
            if ($acti->alumnos[$i]['id_alumno'] == $alumno){
             $indexAlumno = $i;
            } 
        } 

        $projectArray = [
            '_id' => 0,
            'alumnos'=>[
                'id_alumno'=>1,
                'status_entrega'=>1,
                'status_calificacion'=>1,
                'comentario'=>1,
                'modificacion'=>1
            ]
        ];
        
        $data = Actividad::where("alumnos.".$indexAlumno.".id_alumno",'=',$alumno)->where('id_tema','=',$id)
        ->project($projectArray)->first();
        $p=json_decode($data);

        $act=Actividad::where('id_tema','=',$id)->where("alumnos.".$indexAlumno.".id_alumno",'=',$alumno)->get();
        $curs=Tema::where('_id','=',$id)->first();
        $curso=Curso::where('_id','=',$curs->id_curso)->get();
        return view('layouts.alumno.entregarActividad',['id'=>$id,'act'=>$act,'curso'=>$curso])->with('data',$p);
    }

    public function entregarActividad2(Request $request){
        $alumno=Auth::user()->id;
        $link=$request['link_archivo'];
        $id=$request['id'];
        if($request){
            $act=Actividad::where('id_tema','=',$id)->where('alumnos.id_alumno','=',$alumno)->first(); 
            $indexAlumno = 0;
            $date = Carbon::now();
            $date = $date->toDateTimeString();
            for( $i= 0 ; $i < count($act->alumnos) ; $i++ ){
               if ($act->alumnos[$i]['id_alumno'] == $alumno){
                $indexAlumno = $i;
               } 
            } 
            if($act){
                Actividad::where("alumnos.".$indexAlumno.".id_alumno", '=', $alumno)->where('id_tema','=',$id)
                ->update(["alumnos.".$indexAlumno.".link_archivo" => $link,"alumnos.".$indexAlumno.".status_entrega" => "Entregado","alumnos.".$indexAlumno.".modificacion" => $date,"alumnos.".$indexAlumno.".status_calificacion" => 'No calificado']);
            }
        }
        return redirect()->route('entregarActividad',$id);
    }


    public function PDF($id){
        $curso=Curso::where('_id','=',$id)->get();
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $nombre=Auth::user()->nombre;
        $apP=Auth::user()->primer_apellido;
        $apM=Auth::user()->segundo_apellido;
        $pdf=\PDF::loadView('layouts.alumno.constancia',['curso'=>$curso,'fecha'=>$date,'nombre'=>$nombre,'ap'=>$apP,'am'=>$apM]);
        return $pdf->setPaper('a4', 'landscape')->stream('Constancia.pdf');
    }

    
}

