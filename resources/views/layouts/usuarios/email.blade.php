@extends('layouts.master')

@section('meta')
<script src="{{ asset('js/form.js') }}" defer></script>
<link href="{{ asset('css/unirse.css') }}" rel="stylesheet">
@endsection

@section('contenido')
<div class="body-form">
    <!--If para  mensajes success-->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="containerForm" id="container">

        <div class="form-container sign-in-container">
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <h1>Recuperar Contraseña</h1><br>
                <span>Se enviara una verificacion a tu correo electronico</span>
                <input class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus /><br>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input type="submit" class="btn btn-success" value="Enviar">
                <br>
                <a href="{{url('/')}}" class="btn btn-danger">Regresar</a>

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
                    <h1>Ingresa tu correo electronico</h1><br>
                    <p>Recuerda que tu persona tiene que ser eticamente correcta</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection