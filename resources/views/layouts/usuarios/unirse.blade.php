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
    <!--If para  mensajes de error-->
    @if(session('error'))
    <div class="alert alert-danger my-2">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>ERROR </strong>{{session('error')}}
    </div>
    @endif

    <div class="containerForm" id="containerForm">
        <div class="form-container sign-up-container">
            <!--Formulario para registros-->
            <form action="{{route('store')}}" method="POST">
                @csrf

                <h1>Cree su cuenta!</h1>
                <span>Registrese para formar parte de ...</span>
                <input class="form-control mb-2 @error('nombre') is-invalid @enderror" type="text" placeholder="Nombre" name="nombre" value="{{ old('nombre', $usuario->nombre)}}" required>
                @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Primer Apellido" name="primer_apellido" value="{{ old('primer_apellido', $usuario->primer_apellido)}}" required>
                    <input type="text" class="form-control" placeholder="Segundo Apellido" name="segundo_apellido" value="{{ old('segundo_apellido', $usuario->segundo_apellido)}}" required>
                </div>
                <input class="form-control mb-2" type="email" placeholder="Correo electrónico" name="email" value="{{ old('email', $usuario->email)}}" required />
                <input class="form-control mb-2" type="password" placeholder="Contraseña" name="password" value="{{ old('password', $usuario->password)}}" required />
                <input class="form-control mb-2" type="password" placeholder="Confirmar contraseña" name="password_confirmation" value="{{ old('password_confirmation', $usuario->password_confirmation)}}" required />

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Nivel educativo</div>
                    </div>
                    <select class="form-control" id="exampleFormControlSelect1" name="nivel_educativo" value="{{ old('nivel_educativo', $usuario->nivel_educativo)}}" required>
                        <option selected value="bachillerato">Bachillerato</option>
                        <option value="primaria">Primaria</option>
                        <option value="secundaria">Secundaria</option>
                        <option value="superior">Superior</option>
                    </select>
                </div>

                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Institución</div>
                    </div>
                    <input class="form-control" type="text" value="CBTIs 75" name="institucion" value="{{ old('institucion', $usuario->institucion)}}" required>
                </div>

                <input type="number" max="6" min="1" class="form-control mb-2" placeholder="Semestre" name="semestre" value="{{ old('semestre', $usuario->semestre)}}" required>
                <div class="input-group mb-2">
                    <select class="form-control" name="turno" value="{{ old('turno', $usuario->turno)}}" required>
                        <option selected value="">Turno...</option>
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
                <span></span>
                <input class="form-control mb-2" type="email" placeholder="Correo electrónico" name="email" value="{{ old('email', $usuario->email)}}" required autocomplete="email" />
                <input class="form-control mb-2" type="password" placeholder="Contraseña" name="password" value="{{ old('password', $usuario->password)}}" required />

                <input type="submit" class="btn btn-success" value="Iniciar sesion">
                <br>
            </form>

        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Regresar a iniciar sesion </h1>
                    <p> Por favor llene los campos para poder registrase en ...</p>
                    <button class="btn btn-warning" id="signIn">Iniciar sesion</button>

                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenido ...</h1>
                    <p>Cree una cuenta para poder cometar la experiencia en ...</p>
                    <button class="btn btn-success" id="signUp">Registrarse</button>
                    <a href="{{url('recuperar-password')}}" class="btn btn-warning">Recuperar contraseña</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection