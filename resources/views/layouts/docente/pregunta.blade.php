@extends('layouts.master')


@include('layouts.barraDocente')
<link href="{{ asset('css/preguntas.css') }}" rel="stylesheet">
<script src="{{ asset('js/prueba.js') }}" defer></script>
<script src="{{ asset('js/preuba.js') }}" defer></script>
<title>Pregunta</title>
@section('contenido')
  
@if(session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session('success')}}
        </div>
        @endif
        <!--Aqui atilizamos un foreach para poder extraer los datos de curso para poder mandar su id cuando el el usuario regrese a la página de examen y nos muestre los datos del curso-->
        @foreach($cursos as $curso) 
        
      <div id="boton" class="boton" >
      @foreach($periodos as $periodo) 
        @foreach($parciales as $parcial)
            <a href="{{url('/regresoExam',['idc'=>$curso->id,'idparcial'=>$parcial->id, 'idperiodo'=>$periodo->id])}}"><button type="button" name="btnvisualizarPre" hrfe class="btn btn-warning">Regresar</button></a>
            @endforeach  
   @endforeach 
   
      </div>
        <br>
    <div class="card" id="cardOri">
   

    <label for="floatingTextarea2" >Nombre del Examen: </label>
   <!-- Aquí se muestra el nombrey el id del examen que seleccionamos en la pagina del examen y los pasamos a unos inputs para poderlos extraer y insertalos a la base de datos  -->
    @foreach($examenes as $examen) 
    <form   action="{{url('/crearPreguntas')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input class="form-control" readonly="readonly" type="text" value="{{$examen->titulo}}" id="nombre" name="Nomexamen" aria-label="default input example">
    <input class="form-control" readonly="readonly" type="hidden" value="{{$examen->id}}" id="idExam" name="idExam" aria-label="default input example">
    @endforeach  
    @endforeach  
     
    <br><br>
    
    <center><label>Seleccione el tema de la preguntunta: </label></center>
    
    <select class="form-select" name="tema" id="tema" value="0" aria-label="Default select example" >
    <option selected value="0">Temas</option>
    <!--Aquí mostramos todos los temas que existen en la colleccion de temas-->
    @foreach($temas as $tema)
    <option value="{{$tema->nombre_tema}}">{{$tema->nombre_tema}}</option>
   
    @endforeach
    </select>
    
   
    
    
    
    
  
<br>
    <div>
      <label for="floatingTextarea2" >Ingrese el contenido de la pregunta o la imagen</label>
    </div>

   
    <div class="form-floating">
      <textarea class="form-control" name="descripcion" id="descripcion" style="height: 100px" required>Responda la Pregunta?</textarea>
    </div><br>
    <div class="custom-file" id="customFile" lang="es">
          <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp" name = "imagen">      
        </div><br>

    <label for="floatingTextarea2">Respuestas:</label>
    <br>

    <!-- Targeta de la la respuesta numero 1-->

    <br><div class="card">
    <div class="card-body" id="respuestas">
    <label for="floatingTextarea2">Opción 1:</label><br>
    <br><input class="form-control" type="text" placeholder="" id="opcion1" name="opcion1" aria-label="default input example" required>

    <center>
    <label for="floatingTextarea2">Calificación:</label>  
    <select class="form-select" name="puntaje1" id="puntaje1"  required>
    <option  ></option>
    <option value="0">Ninguna</option>
    <option value="50" >50%</option>
    <option value="100">100%</option>
    </select>
    </center>

    <label for="floatingTextarea2">Retroalimentación:</label> 
    <br><input class="form-control" type="text" id="retroalimentacion" name="retroalimetacion1" placeholder="" aria-label="default input example">


    </div> 

    </div>


    <!-- Targeta de la la respuesta numero 2-->
    <br><div class="card">
    <div class="card-body" id="respuestas">
    <label for="floatingTextarea2">Opción 2:</label><br>
    <br><input class="form-control" type="text" placeholder="" id="respuesta2" name="opcion2" aria-label="default input example" required>

    <center>
    <label for="floatingTextarea2">Calificación:</label>  
    <select class="form-select" name="puntaje2" id="puntaje2" required>
    <option  ></option>
    <option value="0">Ninguna</option>
    <option value="50" >50%</option>
    <option value="100">100%</option>
    </select>
    </center>

    <label for="floatingTextarea2">Retroalimentación:</label> 
    <br><input class="form-control" name="retroalimentacion2" type="text" placeholder="" aria-label="default input example">


    </div> 

    </div>


    <!-- Targeta de la la respuesta numero 3-->
    <br><div class="card">
    <div class="card-body" id="respuestas">
       <label for="floatingTextarea2">Opción 3:</label><br>
    <br><input class="form-control" name="opcion3" type="text" placeholder="" id="respuesta2"   aria-label="default input example" required>

    <center>
    <label for="floatingTextarea2">Calificación:</label>  
    <select class="form-select" name="puntaje3" id="puntaje3" required>
    <option  ></option>
    <option value="0">Ninguna</option>
    <option value="50" >50%</option>
    <option value="100">100%</option>
    </select>
    </center>


    <label for="floatingTextarea2">Retroalimentación:</label> 
    <br><input class="form-control" name="retroalimentacion3" type="text" placeholder="" aria-label="default input example">


    </div> 

    </div>
 
    
    
   

    <div id="boton">
    <button type="botton" id="btnlisto" name="btnlisto" onclick="calculateSumListener();" class="btn btn-dark">Listo</button>
    </div>


    </form>
    </div>

    
@endsection

@section('script')
@endsection