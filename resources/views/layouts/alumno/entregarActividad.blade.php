@extends('layouts.master')
@section('meta')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
@endsection

@include('layouts.barraAlumno')
@section('contenido')
<style>
table, th, td {
    border: .px solid black;
    border-collapse: collapse;
    background-color: rgb(240, 240, 240);
}

th:hover, td:hover {
    background-color: rgb(237, 236, 237);
}

th, td {
    padding: 5px;
    height: 4rem;
    text-align: left;
}

table {
    width: 100%;
}

th {
    width: 20%
}

td {
    width: 80%;
}

button {
    background-color: rgb(229, 233, 236);
    padding: .5rem 1rem;
}
</style>
<br>
<div>
    <ul class="breadcrumb">
        <li><a href="{{route('alumno')}}">Inicio</a></li>
        @foreach($curso as $cur)
        <li><a href="{{route('verCurso',$cur->_id)}}">{{$cur->nombre_curso}}</a></li>
        @endforeach
        <li>Actividad</li>
    </ul>
</div>
<div>
</div>
<div>
    <h2 class="subtitle">Actividad</h2>
    <p>Descargar el siguiente documento:</p>
    @foreach($act as $v)
    <p><a href="{{$v->archivo}}" target="_blank">{{$v->archivo}}</a></p>
    @endforeach
</div>
<div>
    <h2 class="subtitle">Estatus de la entrega</h2>
    <table>

        <tr>
            <th>Estatus de la entrega:</th>
            @foreach($data->alumnos as $ac)
            @if($ac->status_entrega == 'Entregado')
            <td style="color:green">Entregado</td>
            @elseif($ac->status_entrega == 'No entregado')
            <td style="color:#ff0000">No Entregado</td>
            @endif
            @endforeach
        </tr>
        <tr>
            <th>Estatus de calificación:</th>
            @foreach($data->alumnos as $a)
            @if($a->status_calificacion == 'Calificado')
            <td style="color:green">Calificado</td>
            @else
            <td>No calificado</td>
            @endif
            @endforeach
        </tr>
        <tr>
            <th>Fecha de entrega:</th>
            @foreach($act as $a)
            <td>{{$a->fecha_entrega}}</td>
            @endforeach
        </tr>
        <tr>
            <th>Ultima modificación:</th>
            @foreach($data->alumnos as $a)
            @if($a->modificacion == 'null')
            <td>-</td>
            @else
            <td>{{$a->modificacion}}</td>
            @endif
            @endforeach
        </tr>
        <tr>
            <th>Comentarios al envío:</th>
            @foreach($data->alumnos as $a)
            @if($a->comentario == 'null')
            <td>Sin comentarios</td>
            @else
            <td>{{$a->comentario}}</td>
            @endif
            @endforeach
        </tr>
    </table>
</div>
<div class="container" style="padding: 5rem 0; height: 5rem;">
    <div class="center">
    <a href="#entregar" role="button" class="btn btn-large btn-primary" data-toggle="modal">Entregar envío</a>
  
  <!-- Modal / Ventana / Overlay en HTML -->
  <div id="entregar" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h6 class="modal-title">Entregar actividad</h6>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              </div>
              <div class="modal-body">
                  <form action="/entregarActividad2" method="post">
                  @csrf
                  <label for=""><h6>Subir link de la actividad</h6></label>
                  <input type="text" class="form-control" placeholder="Agregar link" name="link_archivo"></input>
                  <input type="hidden" name="id" value="{{$id}}">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Entregar</button>
              </div>
              </form>
          </div>
      </div>
  </div>
    </div>
    <div>
        <p class="text-center">Usted no ha hecho un envío</p>
    </div>
    
</div>

@stop