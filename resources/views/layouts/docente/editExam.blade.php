@extends('layouts.master')

@include('layouts.barraDocente')
<link href="{{ asset('css/examen.css') }}" rel="stylesheet">

<title>Examen</title>
@section('contenido')
<body background="{{ asset('img/libro.jpeg')}}" >


<div class="container" id='contenido'>
@if(session('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{session('success')}}
</div>
@endif
@foreach($cursos as $curso) 
    @foreach($periodos as $periodo) 
    @foreach($parciales as $parcial)
      <div id="boton" class="boton" >
      <a href="{{url('/regresoExam',['idc'=>$curso->id,'idparcial'=>$parcial->id, 'idperiodo'=>$periodo->id])}}"><button type="button" name="btnvisualizarPre" hrfe class="btn btn-warning">Regresar</button></a>
      </div>
      @endforeach
      @endforeach
      @endforeach
    <div clas = "row justify-content-center">
        <div class = "col">
        <br><div class="card" id="cuerpo">
<form   action="{{url('examenR')}}" method="post" >
{{csrf_field()}}
<table class="table table-responsive" >
    <thead>
        <tr>
        <th scope="col">
        <h2>Editar Examén</h2>
        </th>
        <th scope="col">
          
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
                <input type="text" id="titulo" value="{{$singlExam->titulo}}" autocomplete="off" name="titulo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                <input type="hidden" name="id" class="form-control" value="{{$singlExam->id}}" placeholder="Enter Name">
            </div>
        </th>
        <td></td>
        <td>
            <div class="col_one_third col_last c-azul">
                <label for="nacimiento">Fecha de Inicio<small></small></label>
                <input type="date" id="fechaInicio" value="{{$singlExam->fechaInicio}}" name="fechaInicio"  class="sm-form-control" required>
            </div>
        </td>
        <td>
            <div class="col_one_third col_last c-azul">
                <label for="nacimiento">Fecha de Termino<small></small></label>
                <input type="date" id="fechaFin"  name="fechaFin" value="{{$singlExam->fechaFin}}"  class="sm-form-control" required>
            </div>
        </td>
        </tr>
        <tr>
        <th scope="row">
        <div class="parcial">
        <label>Núm.Parcial</label>
        <select class="form-select" name="nombre_tema" id="nombre_tema" value="0" aria-label="Default select example"  required>
        <option>{{$singlExam->nombre_tema}}</option>
                 <option value="0">Temas</option>
               
            @foreach($temas as $tema)
                    <option value="{{$tema->nombre_tema}}">{{$tema->nombre_tema}}</option>
                    @endforeach
                   
            </select>
            </div> 
        </th>
        <td></td>
        <td>
            <div class="form-group row" >
                <label for="intentos" class="form-label">Maximo de Intentos</label>
                <div class="col-sm-10">
                <input type="number"  min="1" autocomplete="off" value="{{$singlExam->intentos}}" class="form-control" name="intentos" id="intentos" placeholder="" required>
            </div>
        </td>
        <td>
            <div class="form-group row" >
                <label for="ponderacion" class="form-label">Ponderación</label>
                <div class="col-sm-10">
                <input type="number" step="0.5" min="0" value="{{$singlExam->ponderacion}}" autocomplete="off" name="ponderacion" class="form-control" id="ponderacion" placeholder="" required>
            </div>
        </td>
      
        </tr>
    </tbody>
</table>
<div id="boton" class="boton" >
    <button type="submit" class="btn btn-success">Listo</button>
  
</div><br>

</form>
</div>

        </div>
    </div>
</div>

@endsection

@section('script')
@endsection