@extends('layouts.master')
@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.slim.min.js')}}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js')}}"></script>
@endsection
@include('layouts.barraAdministrador')
@section('contenido')
  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h3>Rendimiento Vespertino</h3>
            </div>
        </div>
    </div>
    <hr>
    <nav class="navbar navbar-light float-right">
  <div class="container-fluid">
    <form class="d-flex">
      <select  name="buscarCarrera" aria-label="Default select example">
      @foreach($carrera as $fc)
      @foreach($grupo as $fg)
      @if($fc->id == $fg->id_carrera)
      <option selected>{{$fc->nombre_carrera}}</option>
      @endif
      @endforeach
      @endforeach
     </select> 
     <select  name="buscarporCurso" aria-label="Default select example">
      @foreach($curso as $fcu)
      @foreach($grupo as $fg)
      @foreach($fcu->grupos as $fcg)
      @if($fg->nombre_grupo == $fcg && $fcu->status_curso == true)
      <option selected>{{$fcu->nombre_curso}}</option>
      @endif
      @endforeach
      @endforeach
      @endforeach
     </select> 
     <select  name="buscarporGrupo" aria-label="Default select example">
     @foreach($grupo as $fg)
     <option selected>{{$fg->nombre_grupo}}</option>
     @endforeach
     </select> 
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
    <form class="d-flex" action="/pdfV">
      <input id="buscarporCarrera" name="buscarporCarrera" type="hidden" value=" {{ app('request')->get('buscarporCarrera') }} ">
      <input id="buscarporGrupo" name="buscarporGrupo" type="hidden" value=" {{ app('request')->get('buscarporGrupo') }}">
      <input id="buscarporCurso" name="buscarporCurso" type="hidden" value=" {{ app('request')->get('buscarporCurso') }} ">
      <button class="btn btn-outline-success" type="submit">Generar Pdf</button>
    </form>
    <a href="{{route('rendimientoM')}}" class="btn btn-sm btn-primary">Volver a consultar</a>
  </div>
  
</nav>
  <div>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Grupo</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Cursos Inscritos</th>
            <th style="text-align: center">Calificacion Parcial 1</th>
            <th style="text-align: center">Calificacion Parcial 2</th>
            <th style="text-align: center">Calificacion Parcial 3</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carrera as $c)
        @foreach($grupo as $g)
        @foreach($g->alumnos as $gg)
        @foreach($usuario as $u)
        @foreach($curso as $cu)
        @foreach($cu->grupos as $cg)
        @foreach($parcial1 as $par)
        @foreach($examen1 as $ex1)
        @foreach($parcial2 as $par2)
        @foreach($examen2 as $ex2)
        @foreach($parcial3 as $par3)
        @foreach($examen3 as $ex3)
        <tr>
        @if($c->id == $g->id_carrera && $u->id == $gg)
        @if($g->nombre_grupo == $cg && $cu->status_curso == true)
        @if($ex1->id == $par->id_examen && $ex1->id_parcial == $par->id)
        @if($ex2->id == $par2->id_examen && $ex2->id_parcial == $par2->id )
        @if($ex3->id == $par3->id_examen && $ex3->id_parcial == $par3->id)
            <td>{{$c->nombre_carrera}}</td>
            <td>{{$g->nombre_grupo}}</td>
            <td>{{$u->nombre}}</td>
            <td>{{$u->primer_apellido}}</td>
            <td>{{$u->segundo_apellido}}</td>
            <td>{{$cu->nombre_curso}}</td>
            @if($par->id_curso == $cu->id && $par2->id_curso == $cu->id && $par3->id_curso == $cu->id)
            @if($ex1->id_alumno == $gg && $ex2->id_alumno == $gg && $ex3->id_alumno == $gg)
                    <td style="text-align: center">{{$ex1->titulo}}: Calificacion:{{$ex1->calificacion}}</td>
                    <td style="text-align: center">{{$ex2->titulo}}: Calificacion:{{$ex2->calificacion}}</td>
                    <td style="text-align: center">{{$ex3->titulo}}: Calificacion:{{$ex3->calificacion}}</td>

                    @elseif($ex1->id_alumno != $gg && $ex2->id_alumno != $gg && $ex3->id_alumno != $gg)
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    @else
                    <td td td style="text-align: center">Sin calificacion</td>
                    <td td td style="text-align: center">Sin calificacion</td>
                    <td td td style="text-align: center">Sin calificacion</td>
                    @endif
            @endif   
            @endif
            @endif
            @endif

            @endif
            @endif 
        </tr>
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach
       @endforeach
       @endforeach
      
        </tbody>
    </table>
    
  </div>
    
@stop