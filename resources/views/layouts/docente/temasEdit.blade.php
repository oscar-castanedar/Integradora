@extends('layouts.master')

@section('meta')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <h4>Editar Pieza</h4>
                <p class="text-successfully">{{Session::get('message')}}</p>
                <div class="card-body">
                <form method="GET" action="{{url('agregarActividad')}}" style="background:#ca370a; color:white; font-weight:bold; padding:15px; border:3px solid #B34F19; margin-top:40px; margin-bottom:40px; text-align:center; font-size:22px; border-radius:10px;"  action="https://gifthunterclub.com/ini/register" accept-charset="UTF-8" class="js-validation-signin">
    <input name="_token" type="hidden" value="ekV4HcXXxN80wMhDQkZDwp0J8eQFR8TDaHMn1l3B">
     @csrf
      <div class="row form-group ">
        <div class="col-lg-6">
          <div class="form-material floating">
            <a>Nombre de la actividad</a>
            <label for="username"></label>
            <input type="text" class="form-control" id="actname" name="nombre_actividad" value="" >
            @error('nombre')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
      <div class="col-lg-6">
        <div class="form-material floating">
         <label for="exampleFormControlSelect1">Tema</label>
          <select class="form-control" id="exampleFormControlSelect1" name="nombre_tema"> 
            @foreach($temas as $t)
              <option selected value="{{$t->nombre_tema}}">{{$t->nombre_tema}}</option>
             @endforeach
          </select>
          
        </div>
      </div>
      <div class="col-lg-5">
        <div class="form-material floating">
        <a>Fecha final</a>
        <label for="fechaentrega"></label>
          <input class="form-control" type="date" placeholder="Default input" name="fecha_entrega" value="">
        </div>
      </div>
      <br>
      <br>
      <div class="col-lg-2">
        <div class="form-material floating">
        <a>Valor</a>
        <label for="valoract"></label>
           <input type="text" class="form-control" id="actname" name="valor" value="">
        </div>  
      <br>
      </div>
      </div>
      <br>
      <br>
      <div class="form-group">
         <label for="exampleFormControlTextarea1">Descripción de la actividad</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
      </div>                 
      <br>                            
                                                     
      </div>
      @if(count($errors)>0)..                                       
       <ul>
          @foreach($errors->all() as $error)
           <li>{{$error}}</li> 
          @endforeach
       </ul>
        @endif
      <!--Error de validación de campos vacios -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-success">Guardar</button> 
      </li>
      </div>
      </form>     

    </div>
  </div>
</div>
@endsection