@extends('layouts.master')

@include('layouts.barraDocente')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/notificacion.css') }}" rel="stylesheet">
<title>Generar Token</title>
@endsection

@section('contenido')
<br>

@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role= "alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('error')}}
    </div>
@endif

@foreach($curso as $cur)
@foreach($grupos as $gru)
@if($gru->nombre_grupo == $grupoo)
@foreach($gru->alumnos as $alu)
@foreach($userA as $usa)
@php ($id = Auth::user()->id)
@php ($idC = $cur->id)
@php ($idG = $gru->id)
@foreach($lista as $lis)
@endforeach
@if($usa->id == $alu)
@endif
@endforeach
@endforeach
@endif  
@endforeach  
@endforeach
<div id = "ab" class = "row">
    <center><div class = "col-4">
        <div class="card border-info mb-3" >
            <div class="card-header">
            <div class="card-body">
                <a href="{{url('lista', compact('id','idC','idG'))}}" class="card-link">Lista asistencia</a>
                <h5 class="card-title">Generar token de Asisitencia</h5>
                <p class="card-text">{{$token}}</p>
                <form action="{{ url('token', compact('id','idC','idG')) }}" method = "POST">
                @csrf
                    <input type="submit" value = "Generar">
                </form>
            </div>
            </div>
        </div>
    </div></center>
</div>
<br>      
@endsection


