@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
<div class="row">
<h1>Mis cursos</h1>
<!--Card de mis cursos-->
@foreach($mis_cursos as $mi_curso)<!--Cilo para enlistar los cursos-->
  @foreach($mi_curso['grupos'] as $nomGrupos)<!--Ciclo para recorrer los nombres del grupo dentro del curso -->
    @if($nomGrupos)<!--If para comprobar que existe el array de los grupos en la coleción cursos-->
     @foreach($grupos as $grupo)<!--Ciclo para reccorer la coleccion grupos-->
      @foreach($grupo['alumnos'] as $alumnoGrupo)<!--Ciclo para recorrer los alumnos de la colección grupo-->
        @if($grupo->nombre_grupo == $nomGrupos && $alumnoGrupo == Auth::user()->_id)<!--If para comprobar nombre grupo y el id del alumno-->
        
        <div class="col-md-2 col-sm-2 m-4" id="tooltip">
                <div class="card card-block p-4">
                  <h5 class="card-title mt-3 mb-3"> {{$mi_curso->nombre_curso}}</h5>
                  @foreach($periodos as $periodo)
                    @if($periodo->nombre_periodo == $mi_curso->nombre_periodo)
                      <span class="card-text lenguage">Inicio: {{$periodo->fecha_inicio}}</span>
                      <span class="card-text">Fin: {{$periodo->fecha_fin}}</span>
                    @endif
                  @endforeach
                  @php ($i = 1)
                  @foreach($avance_curso as $avance)
                    @if($avance->id_alumno === Auth::user()->_id && $mi_curso->_id === $avance->id_curso)
                      @php ($i = 2)
                      <ul class="list-group list-group-flush">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: {{$avance->progreso}}%" aria-valuenow="{{$avance->progreso}}" aria-valuemin="0" aria-valuemax="100">{{$avance->progreso}}%</div>
                          </div>
                          <br>
                              @if($mi_curso->status_curso == true && $avance->progreso <= 99)
                                <a href="{{route('verCurso',$mi_curso->_id)}}" class="btn btn-warning btn-sm">Continuar...</a>
                              @elseif($avance->progreso == 100)
                                <a href="{{route('pdf',$mi_curso->_id)}}" class="btn btn-success btn-sm">Imprimir constancia</a>
                              @else
                                <span class="badge bg-danger">Curso inactivo</span>
                              @endif
                      </ul>
                    @endif
                  @endforeach

                  @if($i < 2 && $mi_curso->status_curso == true)<!--If con la ayuda de una bandera para mostrar el boton y el curso en true-->
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div><br>
                    <a href="{{route('verCurso',$mi_curso->_id)}}" class="btn btn-info btn-sm">Iniciar curso</a>
                  @elseif($i < 2 && $mi_curso->status_curso == false)<!--If con la ayuda de una bandera y el curso en false-->
                    <span class="badge bg-danger">Curso inactivo</span>
                  @endif
                  
                </div>
          </div>
        @endif
      @endforeach
     @endforeach
    @endif
  @endforeach
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
        </li>
      </ul>
    </div>
  </div>
  @endif
  @endif
  @endforeach
</div>
@endsection