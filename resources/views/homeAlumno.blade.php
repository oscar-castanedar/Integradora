@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
<div class="row">
<h1>Mis cursos</h1>
<!--Card de mis cursos-->
@foreach($mis_cursos as $mi_curso)<!--Bucle para recorrer los cursos-->
    @if($mi_curso->estudiantes)<!--If para comprobar que el array de estudiantes existe y evitar errores-->
      @foreach($mi_curso->estudiantes as $est)<!--Bucle anidado para recorrer los estudiantes de un curso-->
          @if($est)<!--If para evitar errores en el Objeto "Cuando en el objecto no esta la estructura bien"-->
            @if($est['email'] == Auth::user()->email) <!--If que comprueba que el email dentro de estudiantes sea igual al email del auth-->
              <div class="col-md-2 col-sm-2 m-4" id="tooltip">
                <div class="card card-block p-4">
                  <h5 class="card-title mt-3 mb-3"> {{$mi_curso->nombre_curso}}</h5>
                  <span class="card-text lenguage">Inicio: {{$mi_curso->fecha_inicio_curso}}</span>
                  <span class="card-text">Fin: {{$mi_curso->fecha_fin_curso}}</span>
                  <ul class="list-group list-group-flush">
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{$est['progreso']}}%" aria-valuenow="{{$est['progreso']}}" aria-valuemin="0" aria-valuemax="100">{{$est['progreso']}}%</div>
                      </div>
                      <br>
                      @if($mi_curso->status_curso == true)
                        <a href="{{route('verCurso',$mi_curso->_id)}}" class="btn btn-warning btn-sm">Continuar...</a>
                      @else
                        <span class="badge bg-danger">Curso inactivo</span>
                      @endif
                  </ul>
                </div>
              </div>
            @endif
          @endif
      @endforeach
    @endif
@endforeach
</div>



<hr>
<h1>Cursos</h1>
<div class="btn-group dropend">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Periodo
  </button>
  <ul class="dropdown-menu">
    <li>
      @foreach($periodos as $periodo)
        @if($periodo->status_periodo == true)
        <a class="dropdown-item" href="/alumno/{{$periodo->nombre_periodo}}">{{$periodo->nombre_periodo}}</a>
        @endif
      @endforeach
      </a>
    </li>
  </ul>
</div>

<!--Row para cursos-->
<div class="row">
  @foreach($cursos as $curso)
  @if($curso->status_curso==true)
  @if($curso)<!--Para evitar errores-->
  <div class="col-md-5 col-sm-6 m-4" id="tooltip">
    <!--PopHovers-->
    <div class="tooltip-box">
      <div class="info">
        <p class="direccion">Temario</p>
        <div>
          @foreach($temas as $tema)
          @if($curso->_id == $tema->id_curso)
          <ol>
            {{$tema->nombre_tema}}
            <ul>
              @foreach($actividades as $actividad)
              @if($tema->_id == $actividad->id_tema)
              <li>
                {{$actividad->nombre_actividad}}
              </li>
              @endif
              @endforeach
            </ul>
          </ol>
          @endif
          @endforeach
          <ul>
        </div>
      </div>
    </div>
    <!--Card de cursos-->
    <div class="card card-block p-4">
      <h5 class="card-title mt-3 mb-3">{{$curso->nombre_curso}}</h5>
      <b><br>Duración curso:</br></b>
      <span class="card-text ">Inicio: {{$curso->fecha_inicio_curso}}</span>
      <span class="card-text lenguage">Fin: {{$curso->fecha_fin_curso}}</span>
      <span class="card-text"><b><br>Resumen</br></b>{{$curso->resumen_curso}}</span>
      <ul class="list-group list-group-flush">
        <span class="card-text"><b><br>Lo que prendera</br></b>{{$curso->descripcion_curso}}</span>
        <br>
          <a href="{{route('verCurso',$curso->_id)}}" class="btn btn-success btn-sm">Ver curso...</a>
        </li>
      </ul>
    </div>
  </div>
  @endif
  @endif
  @endforeach
</div>
@endsection