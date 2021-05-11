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
  <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h3>Lista de Periodos</h3>
              <div class="pull-left" style="text-align: right;width:1100px">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nuevo Periodo
                </a>
            </div>
            </div>
        </div>
    </div>
    <br>
    
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-striped" style='background-color:#FFC85B;'>
        <thead>
        <tr>
            <th>No.</th>
            <th scope="col">Nombre Periodo</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Status</th>
            <th width="280px">Acción</th>
        </tr>
        </thead>
        <tbody style='background-color:#E9FEFF;'>
        @php($i=1)
        @foreach($allPeriodo as $periodos)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$periodos->nombre_periodo}}</td>
            <td>{{$periodos->fecha_inicio}}</td>
            <td>{{$periodos->fecha_fin}}</td>
            <td>@if($periodos->status_periodo == true)
                    <a href="{{url('/status-update',$periodos->id)}}" class="btn btn-success" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                    <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                    </svg></a>
                @else
                    <a href="{{url('/status-update1',$periodos->id)}}" class="btn btn-danger" 
                    onclick="return confirm('¡Confirma la acción!')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                    <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                    </svg></a>
                @endif
            </td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-success" class="bi bi-pencil-square" href="{{route('editPeriodo',['id'=>$periodos->id])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a>
                    @if($periodos->status_periodo == false)
                    <a class="btn btn-danger" href="{{route('deletePeriodo',['id'=>$periodos->id])}}" 
                    onclick="return confirm('Deseas eliminar este periodo')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg></a>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>

    <div class="modal fade" id="create">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h4>Nuevo Periodo</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="tab-pane" id="tab_2">
                    <div class="box">
                      <div class="box-header with-border">
                      </div>
                      <form class="form-horizontal" action="{{route('savePeriodo')}}" method="POST">
                      @csrf
                      <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Nombre Periodo</span>
                                <div class="col-md-9">
                                    <input type="text" name="nombre_periodo" class="form-control" placeholder="Nombre Periodo" value="{{old('nombre_periodo')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Fecha Inicio</span>
                                <div class="col-md-9">
                                    <input type="date" name="fecha_inicio" class="form-control" value="aaaa-mm-dd" min="2021-01-01" max="2026-12-31" value="{{old('fecha_inicio')}}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Fecha Fin</span>
                                <div class="col-md-9">
                                    <input type="date" name="fecha_fin" class="form-control" value="aaaa-mm-dd" min="2021-01-01" max="2026-12-31" value="{{old('fecha_fin')}}" required><br>
                            </div>

                            <div class="form-group">
                                <div class="col-md-9">
                                    <label for="status_periodo">Status</label>
                                    <select class="form-control" id="status_periodo" name="status_periodo" value="{{old('status_periodo')}}}" required>
                                        <option selected value="0">Desactivo</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('¿Confirmas que los datos son correctos?')">Agregar</button>
                                </div>
                            </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
  </div>
@stop