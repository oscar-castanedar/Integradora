@extends('layouts.master')

@include('layouts.barraAlumno')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/notificacion.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<br>

@if(session('error'))
    <div class="alert alert-warning alert-dismissible fade show" role= "alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('error')}}
    </div>
@endif

<div id = "ab" class = "row">
    <center><div class = "col-4">
        <div class="card border-info mb-3" >
            <div class="card-header">
            <div class="card-body">
                <a href="{{url('alumno')}}">Regresar</a>
                <h5 class="card-title">Registrar token de Asisitencia</h5>
                @foreach($curso as $cur)
                @php ($id = $cur->id)
                <form action="{{ url('asistencia',compact('id')) }}" method = "POST">
                @csrf
                    <input type="text" name = "token">
                    <input type="submit" value = "Generar">
                </form>
                @endforeach
            </div>
            </div>
        </div>
    </div></center>
</div>
<br>      
@endsection


