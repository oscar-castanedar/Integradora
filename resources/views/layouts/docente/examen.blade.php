@extends('layouts.master')

@include('layouts.barraDocente')
<link href="{{ asset('css/examen.css') }}" rel="stylesheet">
<title>Examen</title>
@section('contenido')


<!--Aquí mostraremos el mensaje si cualquier acción se realizo correctamente -->
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif

    
<!--Aquí pasamos la variable de curso que nos ayuda a pasar los datos del curso -->
    
    @foreach($cursos as $curso) 
    @foreach($periodos as $periodo) 
    @foreach($parciales as $parcial)
      <div id="boton" class="boton" >
            <a href="{{url('/regreso',['idc'=>$curso->id, 'idp'=>$periodo->id])}}"><button type="button" name="btnvisualizarPre" hrfe class="btn btn-danger">Regresar</button></a>
      </div>
        <div clas = "row justify-content-center">
         
            <br>
        <div class="card" id="cuerpo">
          
       
     <!--Aqui mandamos los datos a la funcion de crearExamen -->
<form   action="{{url('crearExam')}}" method="post" >
@csrf
    <table class="table table-responsive" >
        <thead>
            <tr>
            <th scope="col">
            <h2>Crear Exámen</h2>
            </th>
            <th scope="col">
              
             <!--Aquí mostramos el id del curso para despues poderla guardar en la base de Datos -->
    <input class="form-control" readonly="readonly" type="hidden" value="{{$curso->id}}" id="idCurso" name="idCurso" aria-label="default input example">
    <input class="form-control" readonly="readonly" type="hidden" value="{{$parcial->numero_parcial}}" id="numero_parcial" name="numero_parcial" >
    <input class="form-control" readonly="readonly" type="hidden" value="{{$parcial->id}}" id="idparcial" name="idparcial" >
            </th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">
                <div class="input-group mb-3" id="titulo1">
                    <span class="input-group-text" id="inputGroup-sizing-default">Titulo del Examen: </span>
                    <input type="text" id="titulo" autocomplete="off" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                </div>
            </th>
            <td>
            <input type="hidden" id="idDocente" readonly="readonly" name="idDocente" value="{{ Auth::user()->id}}"  class="sm-form-control" >
            </td>
            <td>
                <div class="col_one_third col_last c-azul">
                    <label for="nacimiento">Fecha de Inicio<small></small></label>
                    
    
   
    <input type="date" id="fechaInicio"  name="fechaInicio"  value="" min="{{$periodo->fecha_inicio}}" max="{{$periodo->fecha_fin}}" class="sm-form-control" required>
                </div>
            </td>
            <td>
                <div class="col_one_third col_last c-azul">
                    <label for="nacimiento">Fecha de Termino<small></small></label>
                    <input type="date" id="fechaFin" value="" min="{{$periodo->fecha_inicio}}" max="{{$periodo->fecha_fin}}" name="fechaFin"  class="sm-form-control" required>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">
            <div class="parcial">
            <select class="form-select" name="nombre_tema" id="nombre_tema" value="0" aria-label="Default select example"  required>
                 <option selected value="0">Temas</option>
               
            @foreach($temas as $tema)
                    <option value="{{$tema->nombre_tema}}">{{$tema->nombre_tema}}</option>
                    @endforeach
                   
            </select>
            </div> 
            </th>
            <td>
            
            </td>
            <td>
                <div class="form-group row" >
                    <label for="intentos" class="form-label">Maximo de Intentos</label>
                    <div class="col-sm-10">
                    <input type="number"  min="1" autocomplete="off" class="form-control" name="intentos" id="intentos" placeholder="" required>
                    </div>
                </div>
            </td>
            <td>
                <div class="form-group row" >
                    <label for="ponderacion" class="form-label">Ponderación</label>
                    <div class="col-sm-10">
                    <input type="number" step="0.5" min="0" autocomplete="off" max="10" name="ponderacion" class="form-control" id="ponderacion" placeholder="" required>
                    </div>
                </div>
            </td>
          
            </tr>
        </tbody>
    </table>
    <div id="boton" class="boton" >
        <button type="submit" class="btn btn-success">Guardar</button>
      
    </div><br>
    </form>
       

 <div class="card" id="card2">
        <div>
            <label>Total de Examenes</label><br>
        </div>
        <div>
            <!--mostrar tabla con preguntas-->
            
            <div class="card-body">
                <table class="table">
                <thead class="thead-dark">
                <th scope="col">Numero</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Fin</th>
                        <th scope="col">Ponderacion</th>
                        <th scope="col">Intentos</th>
                        <th scope="col">Agregar Preguntas</th>
                        <th scope="col">Action</th>
                        </tr>
                </thead>
                <tbody>
                <!-- Aquí extraemos los datos de examen utilizando un foraech para mostrar todos los examen que hay en la base de datos-->
                      @php($i=1)
                      @foreach($examenes as $examen)
                        <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$examen->titulo}}</td>
                        <td>{{$examen->fechaInicio}}</td>
                        <td>{{$examen->fechaFin}}</td>
                        <td><center>{{$examen->ponderacion}}</center></td>
                        <td><center>{{$examen->intentos}}</center></td>
                        <td> 
                       
                        <!--Aqui mandamos a la funcion de agregar preguntas mandando el id del examen selecionado y el id del curso -->
                               <a href="{{url('agregarPregu',['id'=>$examen->id, 'idc'=>$curso->id, 'idparcial'=>$parcial->id, 'idperiodo'=>$periodo->id,])}}"><button type="button" name="btnvisualizarPre" hrfe class="btn btn-warning">Agregar Preguntas</button></a>
                        
                        </td>

                        <td>
                <!--Aqui mandamos a la funcion de actualizar examen mandando el id del examen selecionado y el id del curso -->
                        <a  href="{{url('/update',['id'=>$examen->id, 'idc'=>$curso->id, 'idparcial'=>$parcial->id, 'idperiodo'=>$periodo->id,])}}">   <button type="button"  class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg> Editar</button>
                        </a>
<!--Aqui mandamos a la funcion de eleminar examen mandando el id del examen para poder eleminarlo-->
                        <a  href="{{url('delete',['id'=>$examen->id])}}" ><button type="button" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg> Eliminar</button>
                        </a>
                        </td>
                        </tr>
                        @endforeach 
                        @endforeach   
                        @endforeach 
                        @endforeach

                </tbody>
                </table><br>
        </div>
      </div>

    </div>
        </div>
            </div>


@endsection

@section('script')
@endsection
