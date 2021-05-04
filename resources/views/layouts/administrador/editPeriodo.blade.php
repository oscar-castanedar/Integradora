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

@include('layouts.barraAdministrador')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Periodo</h4>
                    </div>
                    <p class="text-success">{{Session::get('message')}}</p>
                    <div>
                        <form class="form-horizontal" action="{{route('updatePeriodo',$allPeriodo->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Nombre Periodo</span>
                                <div class="col-md-9">
                                    <input type="text" name="nombre_periodo" class="form-control" value="{{$allPeriodo->nombre_periodo}}" placeholder="Nombre Periodo" disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Fecha Inicio</span>
                                <div class="col-md-9">
                                    <input type="date" name="fecha_inicio" class="form-control" value="{{$allPeriodo->fecha_inicio}}" value="aaaa-mm-dd" min="2021-01-01" max="2026-12-31" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Fecha Fin</span>
                                <div class="col-md-9">
                                    <input type="date" name="fecha_fin" class="form-control" value="{{$allPeriodo->fecha_fin}}" value="aaaa-mm-dd" min="2021-01-01" max="2026-12-31" required><br>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9 text-center">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('¿Confirmas que los datos son correctos?')">Actualizar</button>
                                </div>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection