@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link  rel = "stylesheet"  href = "https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" > 

@endsection

@include('layouts.barraDocente')
@section('contenido')
@if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role= "alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif
<div class="row">
<hr>
<h1>Activos</h1>
<!--Card de cursos que ha creado el docente y estan activos-->
@foreach($mis_cursos as $mi_curso)<!--Bucle para recorrer los cursos-->
@if($mi_curso->status_curso == true)<!--if para comprobar que el curso esta activo-->

            @if($mi_curso->autor_curso == Auth::user()->email) <!--If que comprueba que docente corresponde-->
              <div class="col-md-4 col-sm-4 m-4" id="tooltip">
                <div class="card card-block p-4">
                
                  <h5 class="card-title mt-3 mb-3"> {{$mi_curso->nombre_curso}}</h5>
                  <span class="card-text lenguage">Asignatura: {{$mi_curso->asignatura}}</span>
                  <span class="card-text">Periodo: {{$mi_curso->nombre_periodo}}</span><br>
                  <span class="card-text">Resumen: <br>{{$mi_curso->resumen_curso}}</span><br>
                  <span class="card-text">Email profesor: <br>{{$mi_curso->autor_curso}}</span>
                  <ul class="list-group list-group-flush">
                  <p></p>
                  <br>
                  
                  @foreach($periodos as $periodo)<!--bucle para sabes a que perido corresponde cada curso-->
                    @if($periodo->status_periodo == false && $mi_curso->nombre_periodo == $periodo->nombre_periodo)<!--If que activa boton una vez que haya terminado el periodo-->
                    <p align="center"> Desactivar </p>
                  @if($mi_curso->status_curso == true) <!--if para saber si el curso esta activo-->
                    <a href="{{url('/status-curso',$mi_curso->id)}}" class="btn btn-success" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                    </svg></a>
                  @else<!--en caso contrario lo desactiva-->
                    <a href="{{url('/status-curso1',$cursos->id)}}" class="btn btn-danger" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                    <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                    </svg></a>
                  @endif
                  @endif
                  @endforeach
                  <br>
                    <a href="{{route('verCurso',$mi_curso->_id)}}" class="btn btn-warning btn-sm">ver curso</a>
                    
                  <br>
                  <div class="btn-group">

  <button type="button" class="btn btn-secondary  active">Agregar Alumno</button>
  <button type="button" class="btn btn-primary  active">Alumnos Incritos</button>
</div>
                  </ul>
                  <ul  class="navbar-nav ml-auto">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="{{ asset('img/charlando.png') }}" alt="campana-notificaciones" style="width: 30px;height:30px;">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route('enviarNotificacion',$mi_curso->_id)}}"> 
                        Enviar Notificacion</a>
                       </li>
                       <li><a class="dropdown-item" href="{{route('enviarFormulario',$mi_curso->_id)}}">
                        Formulario de asistencia</a>
                       </li>
                  </ul>
                </div>
              </div>
            @endif
          
          
      
      @endif
@endforeach
</div>

<hr>
<div class="row">
<h1>Desactivos</h1>
<!--Card de cursos que ha creado el docente y estan desactivos-->
@foreach($mis_cursos as $mi_curso)<!--Bucle para recorrer los cursos-->
@if($mi_curso->status_curso == false)<!--if para comprobar que el curso esta desactivo-->
     
            @if($mi_curso->autor_curso == Auth::user()->email) <!--If que comprueba que el email dentro de estudiantes sea igual al email del auth-->
              <div class="col-md-4 col-sm-4 m-4" id="tooltip">
                <div class="card card-block p-4">
                
                  <h5 class="card-title mt-3 mb-3"> {{$mi_curso->nombre_curso}}</h5>
                  <span class="card-text lenguage">Asignatura: {{$mi_curso->asignatura}}</span>
                  <span class="card-text">Periodo: {{$mi_curso->nombre_periodo}}</span><br>
                  <span class="card-text">Resumen <br>{{$mi_curso->resumen_curso}}</span>
                  <ul class="list-group list-group-flush">
                  <p></p>
                  <a href="{{route('editarCurso',$mi_curso->_id)}}" class="btn btn-info btn-sm">Editar</a>
                  <br>
                  
                  <p align="center"> Activar </p>
                  @if($mi_curso->status_curso == true) <!--if para saber si el curso esta activo-->
                    <a href="{{url('/status-curso',$mi_curso->id)}}" class="btn btn-success" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                    </svg></a>
                @else<!--en caso contrario lo desactiva-->
                    <a href="{{url('/status-curso1',$mi_curso->id)}}" class="btn btn-danger" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                    <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                    </svg></a>
                @endif
                      <br>


                     
                  </ul>
                </div>
              </div>
            @endif
     
      @endif
@endforeach
</div>




<hr>
<br>
<div class="btn-group dropend">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Periodo
  </button>
  <ul class="dropdown-menu">
    <li>
      @foreach($periodos as $periodo)<!--bucle para recorrer los periodos-->
        @if($periodo->status_periodo == false)<!--ir que confirma que los periodos que estan desactivos-->
        <a class="dropdown-item" href="/docente/{{$periodo->nombre_periodo}}">{{$periodo->nombre_periodo}}</a>
        @endif
      @endforeach
      </a>
    </li>
  </ul>
</div>

<hr>

<!--Row para cursos que estan desactivados-->
<div class="row">
@foreach($cursos as $mi_curso)<!--Bucle para recorrer los cursos-->
@if($mi_curso->status_curso == false)<!--if para comprobar que el curso esta desactivo-->

            @if($mi_curso->autor_curso == Auth::user()->email) <!--If que comprueba que docente corresponde-->
              <div class="col-md-4 col-sm-4 m-4" id="tooltip">
                <div class="card card-block p-4">
                  <h5 class="card-title mt-3 mb-3"> {{$mi_curso->nombre_curso}}</h5>
                  <span class="card-text lenguage">Asignatura: {{$mi_curso->asignatura}}</span>
                  <span class="card-text">Periodo: {{$mi_curso->nombre_periodo}}</span><br>
                  <span class="card-text">Resumen: <br>{{$mi_curso->resumen_curso}}</span>
                  <span class="card-text">Email profesor: <br>{{$mi_curso->autor_curso}}</span>
                  <ul class="list-group list-group-flush">
                  <p></p>
                  <br>
                  
                 
                  </ul>
                </div>
              </div>
            @endif
          
           
      
      @endif
      
@endforeach
</div>


<!-- Modal para crear Curso-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!-- Modal -->
<div class="modal fade" id="ModalCurso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear curso nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<<<<<<< HEAD
=======
      
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
      <form method="POST" action="{{route('crearCurso',['idperiodo'=>$periodo->id])}}" style=" font-weight:bold; padding:15px; border:5px solid #B34F19; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;" action="https://gifthunterclub.com/ini/register" accept-charset="UTF-8" class="js-validation-signin"><input name="_token" type="hidden" value="ekV4HcXXxN80wMhDQkZDwp0J8eQFR8TDaHMn1l3B">
        @csrf
          <div class="row form-group ">
          <div class="col-lg-6">
          <div class="form-material floating">
            <a>Nombre Curso</a>
            <label for="username"></label>
            <input type="text" class="form-control" id="username" name="nombre_curso" value="" placeholder="Nombre Curso">
            @error('nombre')
             <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
            @enderror
          </div>

          <div class="form-material floating">
            <label for="exampleFormControlSelect1">Periodo</label>
            <select class="form-control" name="nombre_periodo" id="exampleFormControlSelect1" value="">
              <option selected value="">Seleccionar Periodo</option>
              @foreach($periodos as $periodo)
        @if($periodo->status_periodo == false)
        <option value="{{$periodo->nombre_periodo}}">{{$periodo->nombre_periodo}} ({{$periodo->fecha_inicio}} <-> {{$periodo->fecha_fin}})</option>
        @endif
<<<<<<< HEAD
        @endforeach
=======
      @endforeach
      
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
            </select>
          </div>
          </div>
          <div class="col-lg-5">
          <div class=" "></div>
          <div class="form-material floating">
            <label for="exampleFormControlSelect1">Asignatura</label>
              <select class="form-control" value=""  name="asignatura" id="exampleFormControlSelect1">
                <option selected value="">Seleccionar Asignatura</option>
                @foreach($asignatura as $as)
                  <option selected value="">{{$as->nombre_asignatura}}</option>
                @endforeach
              </select>
          </div>
          <div class="form-material floating">
          <label for="exampleFormControlSelect1">Grupo</label>
          <select class="form-control" value="" name="grupos[]" id="exampleFormControlSelect1" value="">
            <option selected value="">Seleccionar el Grupo</option>
            @foreach($grupos as $gr)
              <option selected value="">{{$gr->nombre_grupo}}</option>
             @endforeach
          </select>
          </div>
          <br>
          </div>
          <div class="">
          <div class="form-material floating">
          <div class="form-group">
            <a>Resumen del curso</a>
            <label for="exampleFormControlTextarea2"></label>
              <textarea class="form-control" name="resumen_curso" id="exampleFormControlTextarea1" value="" rows="3" placeholder="Resumen del curso"></textarea>
          </div> 
               
          </div>    
          </div>
          <div class="form-group">
          <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary" onclick="return confirm('¿Confirmas que los datos son correctos?')">Agregar</button>
          </div>
          </div>
<!-- ************************************************************************************************************* -->
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>

@endsection
