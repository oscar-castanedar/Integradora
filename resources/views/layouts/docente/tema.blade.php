

@extends('layouts.master')

@include('layouts.barraDocente')
<title>Tema</title>
@section('contenido')


      <!--Aquí mostraremos el mensaje si cualquier acción se realizo correctamente -->
      @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif

        @foreach($parciales as $parcial)
        @foreach($cursos as $curso)
        @foreach($periodos as $periodo)
    
    <div id="boton" class="boton" >
            <a href="{{url('/regreso',['idc'=>$curso->id, 'idp'=>$periodo->id])}}"><button type="button" name="btnvisualizarPre" hrfe class="btn btn-danger">Regresar</button></a>
      </div>
      @endforeach
<div class="card">
  <div class="card-header">
    Crear un Tema 
  </div>
  <div class="card-body">
 
      
    
      <form  action="{{route('/crearTema')}}" method="post">
        @csrf
          <div class="row form-group ">
          <div class="col-lg-5">
            <div class="form-material floating">
              <label for="exampleFormControlSelect1">Nombre del Tema</label>
              <input type="text" class="form-control" id="nom_tema" name="nom_tema" value="" placeholder="">
            </div>
              <br>
          </div>

          <div class="col-lg-5">
          <div class="form-material floating">
            <label for="exampleFormControlSelect1">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="" placeholder="">
          </div>
          <br>
          </div>
          <div class="col-lg-5">
          
     
            <div class="form-material floating">
              <label for="exampleFormControlSelect1">id del curso</label>
              <input type="text" class="form-control" id="id_curso" name="id_curso" value="{{$curso->id}}" placeholder="{{$curso->id}}">
              
            </div>
            @endforeach
            <br>
          </div>
         
          <div class="col-lg-5">
            <div class="form-material floating">
              <label for="exampleFormControlSelect1">id parcial</label>
              <input type="text" class="form-control" id="id_parcial" name="id_parcial" value="{{$parcial->id}}" placeholder="">
              
            </div>
 @endforeach
              <br>
          </div>
        
          <div class="form-group">
             <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary" onclick="">Agregar</button>
             </div>
         </div>
         </form>

         
 
  </div>
</div>
</div>
@endsection

@section('script')
@endsection