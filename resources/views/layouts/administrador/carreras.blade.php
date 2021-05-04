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
                <h3>Listado de Carreras</h3>
              <div class="pull-left" style="text-align: right;width:1100px">
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    Nueva Carrera
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
            <th scope="col">Nombre Carrera</th>
            <th scope="col">Descripción</th>
            <th width="280px">Acción</th>
        </tr>
        </thead>
        <tbody style='background-color:#E9FEFF;'>
        @php($i=1)
        @foreach($allCarrera as $carreras)
        <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$carreras->nombre_carrera}}</td>
            <td>{{$carreras->descripcion}}</td>
            <td>
                <form action="" method="POST">
                    <a class="btn btn-success" class="bi bi-pencil-square" href="{{route('editCarreras',['id'=>$carreras->id])}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a>
                    <a class="btn btn-danger" href="{{route('deleteCarreras',['id'=>$carreras->id])}}" 
                    onclick="return confirm('Deseas eliminar este periodo')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg></a>
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
                <h4>Nueva Carrera</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="tab-pane" id="tab_2">
                    <div class="box">
                      <div class="box-header with-border">
                      </div>
                      <form class="form-horizontal" action="{{route('saveCarrera')}}" method="POST">
                      @csrf
                      <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Nombre Carrera</span>
                                <div class="col-md-9">
                                    <input type="text" name="nombre_carrera" class="form-control" placeholder="Nombre Carrera" value="{{old('nombre_carrera')}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-1 text-center"><i class="fa fa-user bigicon"></i>Descripción</span>
                                <div class="col-md-9">
                                    <textarea type="text" name="descripcion" class="form-control" placeholder="Descripcion" value="{{old('descripcion')}}" required></textarea>
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