@extends('layouts.master')

@if(Auth::user()->rol == 'estudiante')
@include('layouts.barraAlumno')
@elseif(Auth::user()->rol == 'docente')
@include('layouts.barraDocente')
@else(Auth::user()->rol == 'administrador')
@include('layouts.barraAdministrador')
@endif

@section('contenido')
<!--If para  mensajes success-->
@if(session('success'))
<div class="alert alert-success my-2">
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
<h2 class="text-center">Mis datos</h2>
<form action="{{route('actualizar', Auth::user()->_id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Nombre</div>
            </div>
            <input class="form-control" type="text" placeholder="Nombre" name="nombre" value="{{  Auth::user()->nombre}}" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-6 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Primer Apellido</div>
            </div>
            <input type="text" class="form-control" placeholder="Primer Apellido" name="primer_apellido" value="{{ Auth::user()->primer_apellido}}" required>
            <div class="input-group-prepend">
                <div class="input-group-text">Segundo Apellido</div>
            </div>
            <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundo_apellido" value="{{ Auth::user()->segundo_apellido}}" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Correo electrónico</div>
            </div>
            <input class="form-control" type="email" placeholder="Correo electrónico" name="email" value="{{ Auth::user()->email}}" required disabled />
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Contraseña</div>
            </div>
            <input class="form-control" type="password" placeholder="Contraseña" name="password" value="{{ Auth::user()->password}}" required disabled />
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Nivel Educativo</div>
            </div>
            <select class="form-select" id="exampleFormControlSelect1" name="nivel_educativo" value="{{ Auth::user()->nivel_educativo }}" required>
                <option selected value="bachillerato">Bachillerato</option>
                <option value="primaria">Primaria</option>
                <option value="secundaria">Secundaria</option>
                <option value="superior">Superior</option>
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Institución</div>
            </div>
            <input class="form-control" type="text" name="institucion" value="{{ Auth::user()->institucion }}" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Semestre</div>
            </div>
            <input type="number" max="6" min="1" class="form-control" placeholder="Semestre" name="semestre" value="{{ Auth::user()->semestre}}" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="input-group col-md-12 mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">Turno</div>
            </div>
            <select class="form-select" name="turno" value="{{ Auth::user()->turno }}" required>
                <option value="matutino">Matutino</option>
                <option value="vespertino">Vespertino</option>
            </select>
        </div>
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-warning">Actualizar Datos</button>
    </div>

</form>


@endsection