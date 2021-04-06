@extends('layouts.master')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/unirse.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAlumno')

@section('contenido')
<div class="body-form">
    <!--If para  mensajes success-->
    @if(session('success'))
    <div class="alert alert-success my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{session('success')}}
    </div>
    @endif
    <!--If para  mensajes de errores globales-->
    @if(session('error'))
    <div class="alert alert-danger my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>ERROR </strong>{{session('error')}}
    </div>
    @endif
    <!--If para errores de validacion en Inputs-->
    @error('nombre')
        <div class="alert alert-danger my-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error: </strong>{{ $message }}
        </div>
    @enderror
    @error('password')
        <div class="alert alert-danger my-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error: </strong>{{ $message }}
        </div>
    @enderror
    @error('primer_apellido')
        <div class="alert alert-danger my-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error: </strong>{{ $message }}
        </div>
    @enderror
    @error('segundo_apellido')
        <div class="alert alert-danger my-2">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Error: </strong>{{ $message }}
        </div>
    @enderror
    <div class="containerForm" id="containerForm">
        <div class="form-container sign-up-container">
            <!--Formulario para registros-->
            <form action="{{route('store')}}" method="POST">
                @csrf

                <h1>Crea una cuenta</h1>
                <span>Registrate para formar parte de CursosOnlineEasy</span>
                <input class="form-control mb-2 @error('nombre') is-invalid @enderror" type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre')}}" required>
                <div class="input-group mb-2">
                    <input type="text" class="form-control  @error('primer_apellido') is-invalid @enderror" placeholder="Primer Apellido" name="primer_apellido" value="{{ old('primer_apellido')}}" required>
                    <input type="text" class="form-control  @error('segundo_apellido') is-invalid @enderror" placeholder="Segundo Apellido" name="segundo_apellido" value="{{ old('segundo_apellido')}}" required>
                </div>
                <input class="form-control mb-2" type="email" placeholder="Correo electrónico" name="email" value="{{ old('email')}}" required />
                <input class="form-control mb-2 @error('password') is-invalid @enderror" type="password" placeholder="Contraseña" name="password" required />
                <input class="form-control mb-2" type="password" placeholder="Confirmar contraseña" name="password_confirmation" required />

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nivel educativo</div>
                    </div>
                    <select class="form-select" id="exampleFormControlSelect1" name="nivel_educativo" value="{{ old('nivel_educativo')}}" required>
                        <option selected value="bachillerato">Bachillerato</option>
                        <option value="primaria">Primaria</option>
                        <option value="secundaria">Secundaria</option>
                        <option value="superior">Superior</option>
                    </select>
                </div>

                <div class="input-group mb-2">
                    <select class="form-select" aria-label="Default select example" name="nombre_institucion" value="{{ old('nombre_institucion')}}" required>
                        <option selected value="">Seleccionar institución...</option>
                        @foreach($instituciones as $institucion)
                        <option value="{{$institucion->nombre_institucion}}">{{$institucion -> nombre_institucion}}</option>
                        @endforeach
                    </select>
                </div>

                <input type="number" max="6" min="1" class="form-control mb-2" placeholder="Semestre" name="semestre" value="{{ old('semestre')}}" required>
                <div class="input-group mb-2">
                    <select class="form-select" name="turno" value="{{ old('turno')}}" required>
                        <option selected value="">Seleccionar turno...</option>
                        <option value="matutino">Matutino</option>
                        <option value="vespertino">Vespertino</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Registrarse">
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="/login" method="POST">
                @csrf
                <h1>Inicie Sesion</h1>
                <input class="form-control mb-2" type="email" placeholder="Correo electrónico" name="email" value="{{ old('email')}}" required/>
                <input class="form-control mb-2" type="password" placeholder="Contraseña" name="password" required />

                <input type="submit" class="btn btn-success" value="Iniciar sesion">
                <br>
            </form>
            

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Iniciar sesión</h1>
                    
                    <button class="btn btn-warning" id="signIn">Iniciar sesion</button>

                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenido a CursosOnlineEasy</h1>
                    <button class="btn btn-success" id="signUp">Registrarse</button>
                    <a href="{{url('recuperar-password')}}" class="btn btn-warning">Recuperar contraseña</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection