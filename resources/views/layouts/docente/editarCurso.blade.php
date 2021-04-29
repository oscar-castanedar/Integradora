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

@include('layouts.barraDocente')

@section('contenido')
<br>
    <a class="btn btn-primary btn-sm" href="{{route('docente')}}">Atrás</a>
<br>
<br>
@foreach($cursos as $c)
    <h3>Detalles del curso: {{$c->nombre_curso}}</h3>
    @foreach($uno as $u)
    <h4>Última visita al curso: {{$u->ultima_visita}}</h4>
    <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal"">
             Cambiar Periodo
          </button>
          <br>
          <br>
          <br>
          <center>
    
    </center>
    
    <hr>
<h3>Parcial 1</h3>
<div class="row">
    @foreach($tema as $g)  
      <div class="col-md-3 col-sm-6 m-4">
        <div class="card card-block p-4" >
          <h5 class="card-title mt-3 mb-3">{{$g->nombre_tema}}</h5>
          <h5>Descripcion del tema:</h5>
          <p>{{$g->descripcion}}</p>
          <hr>
          <form action="" method="post">
          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#video">
             Ver video
          </button>
          <a href="#" class="btn btn-primary btn-sm">Ver infografía</a>
          <hr>
          <a href="{{route('entregarActividad',$g->_id)}}" class="btn btn-primary btn-sm">Calificar Actividad</a>
          <br>
          <br>
          </form>
        </div>
      </div>
      @endforeach   
    </div>
    <center>
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

  <h3>Parcial 2</h3>
<div class="row">
    @foreach($tema2 as $g)  
      <div class="col-md-3 col-sm-6 m-4">
        <div class="card card-block p-4" >
          <h5 class="card-title mt-3 mb-3">{{$g->nombre_tema}}</h5>
          <h5>Descripcion del tema:</h5>
          <p>{{$g->descripcion}}</p>
          <hr>
          <form action="" method="post">
          <a href="#" class="btn btn-danger btn-sm">Ver video</a>
          <a href="#" class="btn btn-primary btn-sm">Ver infografía</a>
          <hr>
          <a href="{{route('entregarActividad',$g->_id)}}" class="btn btn-primary btn-sm">Calificar Actividad</a>
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

  <h3>Parcial 3</h3>
<div class="row">
    @foreach($tema3 as $g)  
      <div class="col-md-3 col-sm-6 m-4">
        <div class="card card-block p-4" >
          <h5 class="card-title mt-3 mb-3">{{$g->nombre_tema}}</h5>
          <h5>Descripcion del tema:</h5>
          <p>{{$g->descripcion}}</p>
          <hr>
          <form action="" method="post">
          <a href="#" class="btn btn-danger btn-sm">Ver video</a>
          <a href="#" class="btn btn-primary btn-sm">Ver infografía</a>
          <hr>
          <a href="{{route('entregarActividad',$g->_id)}}" class="btn btn-primary btn-sm">Calificar Actividad</a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleecione Parcial</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        .
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar Cambio</button>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Repaso del curso {{$c->nombre_curso}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="">
             Modificar Parcial
          </button>
      </div>
      <div class="modal-body">
        <div class="wrap-modal-slider">
          <div class="your-class">
          @foreach($parcial as $p)
          <iframe src="{{$p->repaso}}" height="500" width="100%" style="border:0"></iframe>
          @endforeach
        </div>
      </div></div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Repaso del curso {{$c->nombre_curso}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="wrap-modal-slider">
          <div class="your-class">
          @foreach($parcial1 as $p)
          <iframe src="{{$p->repaso}}" height="500" width="100%" style="border:0"></iframe>
          @endforeach
        </div>
      </div></div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Repaso del curso {{$c->nombre_curso}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="wrap-modal-slider">
          <div class="your-class">
          @foreach($parcial2 as $p)
          <iframe src="{{$p->repaso}}" height="500" width="100%" style="border:0"></iframe>
          @endforeach
        </div>
      </div></div>
    </div>
  </div>
</div>

<!-- Videos-->
<div class="modal fade" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Video del curso {{$c->nombre_curso}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="wrap-modal-slider">
          <div class="your-class">
          @foreach($tema as $p)
          @if($p->nombre_tema == 'Tema 1')
          <iframe width="460" height="360" src="https://www.youtube.com/embed/videoseries?list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          @endif
          @endforeach
        </div>
      </div></div>
    </div>
  </div>
</div>
    @endforeach
@endforeach
@endsection