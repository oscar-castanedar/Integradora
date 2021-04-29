@extends('layouts.master')

@include('layouts.barraDocente')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/notificacion.css') }}" rel="stylesheet">
<title>Enviar Notificacion</title>
@endsection

@section('contenido')
@if(session("mensaje") && session("tipo"))
    <div class="alert alert-success my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role= "alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
@endif
    <!--If para  mensajes de error-->
    @if(session('error'))
    <div class="alert alert-danger my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>ERROR </strong>{{session('error')}}
    </div>
    @endif
<br>

@foreach($curso as $cur)
@foreach($grupos as $gru)
        @if($gru->nombre_grupo == $grupoo)
        <div class="containerForm" id = "ab" class = "row">
    <div class = "col-4">
       
            <div class="card" id = "principal">
                <div class="card-body">
                <h5 class="card-title">Seleccionar Alumnos</h5>
                <p  id = "dss">Seleccionar todos</p>
                <input type="checkbox" onclick="toggle(this),activarcaja()">
                    <div class="card" id = "color" >
                        <ul class="list-group list-group-flush">
                        @foreach($gru->alumnos as $alu)
                         @foreach($userA as $usa)
                         @php ($id = Auth::user()->id)
                         @php ($idC = $cur->id)
                         @php ($idG = $gru->id)
                         <form name = "f1" id = "form" action="{{ url('crearNotificacion', compact('id','idC','idG')) }}" method = "POST"  class="form-group">
                           @csrf
                         @if($usa->id == $alu)
                            <div class="form-group">
                                <li class="list-group-item "  id = "principal2">
                                    <p id = "dss">{{$usa->nombre}}  {{$usa->primer_apellido}}  {{$usa->segundo_apellido}}</p>
                                    <input value = "{{$usa->email}}" name = "emails[]" type="checkbox" id ="a" onclick = "activarcaja()">
                                    <script>
                                        function toggle(source) {
                                        checkboxes = document.getElementsByName('emails[]');
                                        for(var i=0, n=checkboxes.length;i<n;i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                        }
                                    </script>
                                </li>
                            </div>
                         @endif
                         @endforeach
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    </div>
    <div class = "col-4" id = "act" >
        <div class="card border-danger mb-3"  >
        <center><div class="card-header"><h3>{{$cur->nombre_curso}}</h3></div></center>
            <div class="body-form" id="secundario">
                <center><div class = "" id = "ds" ><h4>Asunto</h4></div></center>
                <center>
                <div id = "d" ><textarea class="form-control" name="asunto" id = "d" cols="1" rows="5" required></textarea>
                </div></center><br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input type="submit" class="btn btn-success" id = "boton"  onclick="return confirm('¡Confirma la acción!')" disabled = "">
                    <script type="text/javascript">
                        function activarcaja(){
                            document.getElementById('boton').disabled=false
                        }
                    </script>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<br>
            @endif  
        @endforeach  
    @endforeach      

@endsection