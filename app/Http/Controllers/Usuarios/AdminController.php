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

    ////////////
    //Funcion para mostrar la tabla con los periodos creados.
    public function periodo(){
        $periodos = Periodo::orderBy('created_at','desc')->get();
        return view('layouts.administrador.periodo',['allPeriodo'=>$periodos]);
    }

    //Funcion para guardar los periodos validando por metodo de request. Y validando que no 
    // se inserten periodos repetidos
    public function savePeriodo(Request $request){
        $getNombre = $request['nombre_periodo'];
        $getFecha = $request['fecha_inicio'];
        $getFechaFin = $request['fecha_fin'];
    
        if (Periodo::where('nombre_periodo', '=', $getNombre)->exists()) {
            return back()->with('message', 'Este periodo ya existe.');
        } else {
            if($getFecha < $getFechaFin){
            request()->validate([
                'nombre_periodo' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'status_periodo' => 'required',
            ]);

            Periodo::create($request->all());


            return redirect('periodo')
                        ->with('message','Periodo agregado con exito');
        }else{
            return back()->with('message', 'La fecha fin debe ser mayor que fecha inicio.');
        }
        }
    }

    //Funcion para lanzar la vista para poder editar los periodos
    public function edit($id){
        $periodos = Periodo::find($id);
        return view('layouts.administrador.editPeriodo',['allPeriodo'=>$periodos]);
    }

    //Funcion para poder actualizar los periodos con metodo request para validar.
    public function updatePeriodo(Request $request, Periodo $id){
        
        request()->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        
        $id->update($request->all());

        return redirect('/periodo')
                        ->with('message','Periodo actualizado con exito');
    }

    //Funcion para cuando el status del periodo este activo poder desactivarlo.
    public function statusupdate($id){
        $periodos = Periodo::find($id);
        $periodos->status_periodo = false;

        $periodos->save();

        return redirect('/periodo')
                    ->with('message','Status actualizado con exito');
    }

    //Funcion para cuando el status del periodo este desactivo poder activarlo
    //verificando que se encuentre solo un status activo
    public function statusupdate1($id){

        if (Periodo::where('status_periodo', '=', true)->exists()) {
            return back()->with('message', 'Ya se encuentra un periodo activo.');
        } else{
            $periodos = Periodo::find($id);
            $periodos->status_periodo = true;
            $periodos->save();

            return redirect('/periodo')
                        ->with('message','Status actualizado con exito');
        }
    }

    //Funcion para poder eliminar el periodo
    public function delete($id){
        $periodos = Periodo::find($id);
        $periodos->delete();

        return redirect('/periodo')
                    ->with('message','Periodo eliminado con exito');
    }


    /////////////////
    //Funcion para poder mostrar la vista de los participantes
    public function participantes(){
        $usuario=User::all();
        return view('layouts.administrador.participantes', ['listaAlumnos'=>$usuario]);
    }

    //Funcion para cambiar el status de los usuarios cuando esta activo poder desactivarlo
    public function statusupdate2($id){
        $curso = Curso::find('autor_curso');

        if (User::where('email', '=', $curso)->exists()) {
            $usuario = User::find($id);
            $usuario->status_usuario = false;
            $usuario->save();

            return redirect('/participantes')
                    ->with('message','Status actualizado con exito');
        } else{
            return back()->with('message', 'Este docente esta inscrito a un curso.');
        }
    }

    //Funcion para cambiar el status de los usuarios cuando esta desactivo poder activarlo
    public function statusupdate3($id){
        $usuario = User::find($id);
        $usuario->status_usuario = true;
        $usuario->save();

        return redirect('/participantes')
                        ->with('message','Status actualizado con exito');
    }


    ////////////
    //Funcion para mostrar la vista de instituciones 
    public function instituciones(){
        $instituciones = Institucion::orderBy('created_at','desc')->get();
        return view('layouts.administrador.instituciones',['allInstitucion'=>$instituciones]);
    }

    //Funcion para poder agregar una institucion validando que no se encuentre una con ese mismo nombre
    public function saveInstitucion(Request $request){
        $getNombre = $request['nombre_institucion'];

        if (Institucion::where('nombre_institucion', '=', $getNombre)->exists()) {
            return back()->with('message', 'El nombre que se ingresó ya existe.');
        } else {
            $data=request()->validate([
                'nombre_institucion' => 'required',
                'cct' => 'required',
                'nombre_director' => 'required',
                'telefono' => 'required|max:10|min:10',
                'domicilio' => 'required',
            ]);
    
            Institucion::create([
                'nombre_institucion'=>$data['nombre_institucion'],
                'cct'=>$data['cct'],
                'nombre_director'=>$data['nombre_director'],
                'telefono'=>$data['telefono'],
                'domicilio'=>$data['domicilio']
            ]);

            return redirect('instituciones')
                        ->with('message','Institucion agregada con exito');
        }
    }

    //Funcion para mostrar la vista para poder realizar la actualizacion de las instituciones
    public function edit2($id){
        $instituciones = Institucion::find($id);
        return view('layouts.administrador.editInstituciones',['allInstitucion'=>$instituciones]);
    }

    //Funcion para poder actualizar las instituciones 
    public function updateInstitucion(Request $request, Institucion $id){
        
        request()->validate([
            'nombre_institucion' => 'required',
            'cct' => 'required',
            'nombre_director' => 'required',
            'telefono' => 'required|max:10|min:10',
            'domicilio' => 'required',
        ]);
        
        $id->update($request->all());

        return redirect('/instituciones')
                        ->with('message','Institucion actualizada con exito');
    }

    //Funcion para eliminar las instituciones
    public function delete2($id){
        $instituciones = Institucion::find($id);
        $instituciones->delete();

        return redirect('instituciones')
                    ->with('message','Institucion eliminada con exito');
    }


    ////////////////
    //Funcion para poder mostrar la vista de las carreras
    public function carreras(){
        $carreras = Carrera::orderBy('created_at','desc')->get();
        return view('layouts.administrador.carreras', ['allCarrera'=>$carreras]);
    }

    //Funcion para poder guardar las carreras nuevas validando que no se encuentren dos carreras iguales
    public function saveCarrera(Request $request){
        $getNombre = $request['nombre_carrera'];

        if (Carrera::where('nombre_carrera', '=', $getNombre)->exists()) {
            return back()->with('message', 'La carrera que se ingresó ya existe.');
        } else {
            request()->validate([
                'nombre_carrera' => 'required',
                'descripcion' => 'required',
            ]);


            Carrera::create($request->all());


            return redirect('carreras')
                        ->with('message','Carrera agregada con exito');
        }
    }

    //Funcion para mostrar la vista para poder editar las carreras
    public function edit3($id){
        $carreras = Carrera::find($id);
        return view('layouts.administrador.editCarreras',['allCarrera'=>$carreras]);
    }

    //Funcion para poder actualizar las carreras
    public function updateCarreras(Request $request, Carrera $id){
        
        request()->validate([
            'nombre_carrera' => 'required',
            'descripcion' => 'required',
        ]);
        
        $id->update($request->all());

        return redirect('/carreras')
                        ->with('message','Carrera actualizada con exito');
    }

    //Funcion para poder eliminar las carreras
    public function delete3($id){
        $carreras = Carrera::find($id);
        $carreras->delete();

        return redirect('carreras')
                        ->with('message','Carrera eliminada con exito');
    }


//////////////////
}
