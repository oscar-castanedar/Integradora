<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pregunta;
use App\Models\Examen;
use App\Models\Curso;
use App\Models\Parcial;
use App\Models\Periodo;
use App\Models\Tema;
use SebastianBergmann\Environment\Console;

class PreguntaController extends Controller
{
   

   

    /**
     * Store a newly created resource in storage.
     *Aquí se reciben los datos de los input de la vista de las preguntas para des pues insertarlas en la base de datos.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    
    
        $getfile = $request['imagen'];//aqui extraemos el contenido del input de subir imagen.

        $puntaje1 = $request['puntaje1'];
        $puntaje2 = $request['puntaje2'];
        $puntaje3 = $request['puntaje3'];

        if($puntaje1 == "0" And $puntaje2 == "0"){
            if($puntaje3 == "0"){
                return back()->with('success', 'Chales no se inserto..');
            }
        }
        //echo($getfile);

       

        if(empty($getfile)){//aqui preguntamos que si ese input viene vacío nos inserte los datos sin el contenido del input de lo controrio que si no viene vacío se inserta su contenido porque si no hacemos estos nor marcaria error. 
            $pregunta = new Pregunta([
                
                //   'puntaje' => $request->get('puntaje'),
                
                'idExam'=> $request->get('idExam'),
                'Nomexamen'=> $request->get('Nomexamen'),
                'descripcion'=> $request->get('descripcion'),
                'tema'=> $request->get('tema'),
                
                'opciones' => [
                   'opcion1'=> $request->get('opcion1'),
                   
                   'puntaje1'=> $request->get('puntaje1'),
                   'retroalimentacion1'=> $request->get('retroalimetacion1'),
                   'opcion2'=>$request->get('opcion2'),
                   'puntaje2'=>$request->get('puntaje2'),
                   'retroalimentacion2'=>$request->get('retroalimentacion2'),
                   'opcion3'=>$request->get('opcion3'),
                   'puntaje3'=>$request->get('puntaje3'),
                   'retroalimentacion3'=>$request->get('retroalimentacion3'),
                ],
                
        
      
                   ]);
        }else{

            
            $pregunta = new Pregunta([
                
            
                $name = $request -> file('imagen')->getClientOriginalName(),
                $request->imagen->move(storage_path('app/public/files'),$name),
                'idExam'=> $request->get('idExam'),
                
                'Nomexamen'=> $request->get('Nomexamen'),
                'tema'=> $request->get('tema'),
                'descrpcion'=> $request->get('descripcion'),
                'imagen' => $name,
             
                'opciones' => [
                   'opcion1'=> $request->get('opcion1'),
                   'puntaje1'=> $request->get('puntaje1'),
                   'retroalimentacion1'=> $request->get('retroalimetacion1'),
                   'opcion2'=>$request->get('opcion2'),
                   'puntaje2'=>$request->get('puntaje2'),
                   'retroalimentacion2'=>$request->get('retroalimentacion2'),
                   'opcion3'=>$request->get('opcion3'),
                   'puntaje3'=>$request->get('puntaje3'),
                   'retroalimentacion3'=>$request->get('retroalimentacion3'),
                ],
                
        
      
                   ]);
        }
    
    
                $pregunta->save();//guardamos los datos en base de datos y retornamos el mensaje que si se inserto correctamente.
    
             
               
                 return back()->with('success', 'Pregunta Agregada Correctamente..');
        
    }

   




/*En esta funcion recinimos las dos id mandadas desde la vista del examen,
para utilizarlas y hacer una consulta con las dos para extraer los datos de los documentos que pertenecen esas id y 
despues mandar esos datos a la vista de crear preguntas 

*/
    public function agregarPre($id, $idc, $idparcial, $idperiodo) 
    {
        //el idc lo acabas de poner? en la vita?
        $examenes=examen::where('_id',$id)->get();
        $cursos=Curso::where('_id',$idc)->get();
        $temas = Tema::where('id_parcial',$idparcial)->get();
        $parciales = Parcial::where('_id',$idparcial)->get();
        $periodos = Periodo::where('_id',$idperiodo)->get();
       
        return view('layouts.docente.pregunta',compact('examenes', 'cursos','parciales','temas','periodos'));
    }

    public function regresoExam($idc, $idparcial, $idperiodo)//esta función nos regresa a la pagina de los parciales con todos los datos necesarios.
    {
        //
        $cursos=Curso::where('_id',$idc)->get();//Aqui extraemos el id del curso y para extraer sus datos pasarlos a examen
        $singlExam = "singleExam";
        $examenes = Examen::where('idparcial',$idparcial)->get();//aqui extraemos los datos del examen
        
        $periodos=Periodo::where('_id',$idperiodo)->get();//aqui lo de parcial
        $temas = Tema::where('id_parcial',$idparcial)->get();
        $parciales = Parcial::where('_id',$idparcial)->get();
        
        return view('layouts.docente.examen',compact('cursos','temas', 'examenes', 'periodos', 'parciales'));//Aqui regresamos la vista del examen y compactamos todos los datos de las colecciones consultadas
    }
}
