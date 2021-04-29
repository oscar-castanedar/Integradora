@extends('layouts.master')

@include('layouts.barraDocente')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/notificacion.css') }}" rel="stylesheet">
<title>Lista alumnos</title>
@endsection

@section('contenido')
<br>
@if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role= "alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>ERROR </strong>{{session('error')}}
    </div>
@endif

<div class="containerForm" id = "ab" class = "row">
    <div class = "col">       
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Alumno</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
            @php($i = 0)
                @foreach($lista as $lis) <!-- recorer la lista -->
                @foreach($token as $tok) <!-- Recorrer el token -->
                @foreach($userA as $us) <!-- Recorrer los usuarios -->
                @if($lis->token == $tok->token) <!-- comprar el token del las listas con el token -->
                @if($lis->alumno == $us->id) <!-- comparar si el alumno de ls lisat es igual al id del usuario -->
                @php($i++)   
                <tr>
                    <th>{{$i}}</th>
                    <th>{{$us->nombre}} {{$us->primer_apellido}} {{$us->segundo_apellido}}</th>
                    <th>{{$tok->fecha}}</th>
                </tr>
                @endif
                @endif
                @endforeach
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
</script>
<br>      
@endsection


