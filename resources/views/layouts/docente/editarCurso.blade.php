@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.slim.min.js')}}"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js')}}"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js')}}"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js')}}"></script>
@endsection

@include('layouts.barraDocente')

@section('contenido')
<br>
<a class="btn btn-primary btn-sm" href="{{route('docente')}}">Atrás</a>
<br>
<br>
<!-- Consulta que muestra el nombre del curso creado -->
@foreach($cursos as $c)
<h3>Detalles del curso: {{$c->nombre_curso}}</h3>
@foreach($uno as $u)
<h4>Última visita al curso: {{$u->ultima_visita}}</h4>
<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal"">
             Ajustes Generales del curso
          </button>
          <br>
          <br>
          <br>
          <center>
    
    </center>
    <!-- Por cada parcial consulta los temas asignados -->
    <hr>
<h3>Parcial 1</h3>
<div class=" row">
    @foreach($tema as $g)
    <div class="col-md-3 col-sm-6 m-4">
        <div class="card card-block p-4">
            
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre de la actividad</th>
                    <th scope="col">Tema</th>
                    <th scope="col">Fecha de entrega</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($act as $act)
                    <tr>
                    <th scope="row"></th>
                    <td>{{$act->nombre_actividad}}</td>
                    <td>{{$act->nombre_tema}}</td>
                    <td>{{$act->fecha_entrega}}</td>
                    <td>{{$act->valor}}</td>
                    <td>{{$act->descripcion}}</td>
                    <td>
                    <a href="{{route('editPiezas',['id'=>$piezas->id])}}"
                        class="btn btn-outline-success">Editar</a>
                    <br>
                    <a href="{{route('deletePiezas',['id'=>$piezas->id])}}"
                        class="btn btn-danger">Eliminar</a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

        </div>
    </div>
    @endforeach
    </div>
    <center>
    <!-- En este parrafo esta el codigo donde consulta el repaso del tema que ha sido creado -->
        @foreach($parcial as $p)
        @if($p->repaso == 'null')
        <button type="submit" class="btn btn-primary btn-sm" disabled="disabled">
            Aún no hay repaso</button>
        @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
            Ver repaso
        </button>
        @endif
        @endforeach
        
        <a href="#" class="btn btn-primary btn-sm">Hacer Examen</a>
        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="">
            Modificar Parcial
        </button>
    </center>
    <hr>
    <!-- Muestra y contiene lo mismo que el primer parcial, pero cada uno con los temas aasiganados y actividades -->
    <h3>Parcial 2</h3>
    <div class="row">
        @foreach($tema2 as $g)
        <div class="col-md-3 col-sm-6 m-4">
            <div class="card card-block p-4">
                <h5 class="card-title mt-3 mb-3">{{$g->nombre_tema}}</h5>
                <h5>Descripcion del tema:</h5>
                <p>{{$g->descripcion}}</p>
                <hr>
                <form action="" method="post">
                    <a href="#" class="btn btn-danger btn-sm">Ver video</a>
                    <a href="#" class="btn btn-primary btn-sm">Ver infografía</a>
                    <hr>
                    <a href="{{route('entregarActividad',$g->_id)}}" class="btn btn-primary btn-sm">Calificar
                        Actividad</a>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <center>
        @foreach($parcial1 as $p)
        @if($p->repaso == 'null')
        <button type="submit" class="btn btn-primary btn-sm" disabled="disabled">
            Aún no hay repaso</button>
        @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter1">
            Ver repaso
        </button>
        @endif
        @endforeach
        <a href="#" class="btn btn-primary btn-sm">Hacer Examen</a>
        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="">
            Modificar Parcial
        </button>
    </center>
    <hr>
<!-- Muestra y contiene lo mismo que el primer parcial, pero cada uno con los temas aasiganados y actividades -->
    <h3>Parcial 3</h3>
    <div class="row">
        @foreach($tema3 as $g)
        <div class="col-md-3 col-sm-6 m-4">
            <div class="card card-block p-4">
                <h5 class="card-title mt-3 mb-3">{{$g->nombre_tema}}</h5>
                <h5>Descripcion del tema:</h5>
                <p>{{$g->descripcion}}</p>
                <hr>
                <form action="" method="post">
                    <a href="#" class="btn btn-danger btn-sm">Ver video</a>
                    <a href="#" class="btn btn-primary btn-sm">Ver infografía</a>
                    <hr>
                    <a href="{{route('entregarActividad',$g->_id)}}" class="btn btn-primary btn-sm">Calificar
                        Actividad</a>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <center>
        @foreach($parcial2 as $p)
        @if($p->repaso == 'null')
        <button type="submit" class="btn btn-primary btn-sm" disabled="disabled">
            Aún no hay repaso</button>
        @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter2">
            Ver repaso
        </button>
        @endif
        @endforeach
        <a href="#" class="btn btn-primary btn-sm">Hacer Examen</a>
        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="">
            Modificar Parcial
        </button>
    </center>
    <hr>
    <br>


    <!-- Modal para mostrar los ajustes generales del curso -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label for="exampleFormControlSelect1">Cambiar Periodo</label>
                    <select class="form-control" name="nombre_periodo" id="exampleFormControlSelect1" value=""><br>
                    <option selected value="">Seleccionar el Periodo</option>
                        @foreach($periodos as $periodo)
                        @if($periodo->status_periodo == false)
                        <option value="{{$periodo->nombre_periodo}}">{{$periodo->nombre_periodo}}
                            ({{$periodo->fecha_inicio}} <-> {{$periodo->fecha_fin}})</option>
                        @endif
                        @endforeach
                    </select>
                    </div>
                    <div class="modal-header">
                    <label for="exampleFormControlSelect1">Cambiar Grupo</label>
                    <select class="form-control" name="grupos[]" id="exampleFormControlSelect1" value=""><br>
                    <option selected value="">Seleccionar el Grupo</option>
                        @foreach($grupos as $gr)
                        <option selected value="">{{$gr->nombre_grupo}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="modal-header">
                    <label for="exampleFormControlSelect1">Cambiar Asignatura</label>
                    <select class="form-control" name="asignatura" id="exampleFormControlSelect1" value=""><br>
                    <option selected value="">Seleccionar la asignatura</option>
                        @foreach($asignatura as $as)
                        <option selected value="">{{$as->nombre_asignatura}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="modal-footer">
        <button type="button" class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary"  data-dismiss="modal" onclick="return confirm('¿Deseas hacer el cambio?')">Guardar Cambio</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @endforeach
    @endsection