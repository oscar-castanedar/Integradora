@extends('layouts.master')

@include('layouts.barraDocente')
<title>Parcial</title>
@section('contenido')
<<<<<<< HEAD
<br>
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal">
  Crear parcial 
</button> 
<br>     
=======

<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal">
  Crear un nuevo Parcial
</button> 
      
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e

      <!--Aquí mostraremos el mensaje si cualquier acción se realizo correctamente -->
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif
<<<<<<< HEAD
    <br>
    <!--Muestra los Parciales Creados-->
    @foreach($parciales as $parcial)
    <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">   
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      {{$parcial->nombre_parcial}}
                    </button>
=======

    <!--Muestra los Parciales Creados-->
    @foreach($parciales as $parcial)
    <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                  
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      {{$parcial->nombre_parcial}}
                    </button>
                 

>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
<<<<<<< HEAD
                      
                        @foreach($periodos as $periodo )
                        @foreach($cursos as $curso )
                        <a  href="{{url('/vistaActividad',['id'=>$curso->id, 'idP'=>$periodo->id, 'idparcial'=>$parcial->id]) }}" > <button class="btn btn-primary me-md-2"  type="button">Agregar Actividad</button></a>
=======
                       <a> <button class="btn btn-primary me-md-2" type="button">Agregar Actividad</button></a>
                        @foreach($periodos as $periodo )
                        @foreach($cursos as $curso )
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
                        <a  href="{{url('vistaExam',['id'=>$curso->id, 'idP'=>$periodo->id, 'idparcial'=>$parcial->id])}}"> <button class="btn btn-primary"  onclick="return confirm('Recuerde que tiene que tener todos los temas listo.')" type="button">Agregar Examen</button></a>
                        <a  href="{{url('vistaTema',['idc'=>$curso->id, 'idperiodo'=>$periodo->id, 'idparcial'=>$parcial->id])}}"> <button class="btn btn-success" type="button">Agregar Temas</button></a>
                        @endforeach
                        @endforeach
<<<<<<< HEAD
                      
                    </div>
                    </div>
                </div>
                </div>
                @endforeach
              </div>
    <!-- Modal -->
=======
                       <a> <button class="btn btn-primary" type="button">Agregar Tarjeta</button></a>
                  
                        <a><button class="btn btn-primary" type="button">Agregar Contenido</button></a>
                        
                    </div>
                    </div>
                </div>
                
               
                </div>
                @endforeach
    </div>

<!-- Modal -->
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"> 
        <h5 class="modal-title" id="exampleModalLabel">Crear Parcial</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      <div class="modal-body">
      @foreach($cursos as $curso)
      @foreach($periodos as $periodo)
      <form  action="{{route('/crearParcial',['idc'=>$curso->id,'idperiodo'=>$periodo->id])}}" method="post">
      @endforeach
        @csrf
<<<<<<< HEAD
        
=======
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
          <div class="row form-group ">
          <div class="col-lg-5">
            <div class="form-material floating">
              <label for="exampleFormControlSelect1">Numero de parcial</label>
<<<<<<< HEAD
              <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
              <option selected>Elegir</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
=======
              <input type="number" class="form-control" id="numero_parcial" name="numero_parcial" value="" placeholder="">
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
            </div>
              <br>
          </div>

          <div class="col-lg-5">
          <div class="form-material floating">
            <label for="exampleFormControlSelect1">Nombre Parcial</label>
            <input type="text" class="form-control" id="nom_parcial" name="nom_parcial" value="" placeholder="">
          </div>
          <br>
          </div>
          <div class="col-lg-5">
            <div class="form-material floating">
           
<<<<<<< HEAD
              <label for="exampleFormControlSelect1">id del curso</label>
           
              <input type="text" class="form-control" id="id_curso" name="id_curso" value="{{$curso->id}}" placeholder="{{$curso->id}}">
=======
            
           
              <input type="hidden" class="form-control" id="id_curso" name="id_curso" value="{{$curso->id}}" placeholder="{{$curso->id}}">
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
              
            </div>
            <br>
          </div>
          <div class="col-lg-5">
            <div class="form-material floating">
              <label for="exampleFormControlSelect1">Nombre del curso</label>
              <input type="text" class="form-control" id="nom_curso" name="nom_curso" value="{{$curso->nombre_curso}}" placeholder="{{$curso->nombre_curso}}">
              @endforeach
            </div>
              <br>
          </div>
          
         
          <div class="form-group">
             <div class="col-md-12 text-center">
<<<<<<< HEAD
                <button type="submit" class="btn btn-primary" onclick="return confirm('¿Confirmas que los datos son correctos?')">Agregar</button>
=======
                <button type="submit" class="btn btn-primary" onclick="">Agregar</button>
>>>>>>> 0fadfd897567a1decc48d1ac6ba1dd188d7d928e
             </div>
         </div>
         </form>
      </div>
    </div>
  </div>
</div>






@endsection


@section('script')
         <!-- Modal para crear Curso-->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   
@endsection
