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
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <h1>Ingresa tu nueva contraseña</h1><br>
                <input type="hidden" name="token" value="{{ $token }}">
                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <br>
                <div class="form-group row mb-0">
                    <button type="submit" class="btn btn-success">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    
                    <p>Una vez ingreses tu nueva contraseña, se iniciara sesión.Con los cambios correspondientes.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection