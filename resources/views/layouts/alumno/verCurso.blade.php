@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
@foreach($cursos as $curso)
<h3>Detalles del curso de {{$curso->nombre}}</h3>
@endforeach   
@endsection