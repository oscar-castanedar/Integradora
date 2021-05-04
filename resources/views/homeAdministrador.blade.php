@extends('layouts.master')

@section('meta')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@include('layouts.barraAdministrador')

@section('contenido')
<main class="contenedor sombra">
  <h2> Mis Actividades</h2>

  <div class="servicios">
      <section class="servicio"> 
          <h3>Periodos</h3>{{-- Boton para peridos --}}
          <div class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <rect x="4" y="5" width="16" height="16" rx="2" />
              <line x1="16" y1="3" x2="16" y2="7" />
              <line x1="8" y1="3" x2="8" y2="7" />
              <line x1="4" y1="11" x2="20" y2="11" />
              <rect x="8" y="15" width="2" height="2" />
            </svg>
          </div>
          <a class="boton" href="{{url('periodo')}}">Ver</a>
      </section>
      
         <section class="servicio">
          <h3>Instituciones</h3>{{-- Boton para instituciones --}}
          <div class="icono">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="3" y1="21" x2="21" y2="21" />
            <line x1="3" y1="10" x2="21" y2="10" />
            <polyline points="5 6 12 3 19 6" />
            <line x1="4" y1="10" x2="4" y2="21" />
            <line x1="20" y1="10" x2="20" y2="21" />
            <line x1="8" y1="14" x2="8" y2="17" />
            <line x1="12" y1="14" x2="12" y2="17" />
            <line x1="16" y1="14" x2="16" y2="17" />
          </svg>
            </div>
            <a class="boton" href="{{url('instituciones')}}">Ver</a>
      </section>
      
          <section class="servicio">
          <h3>Activar Docentes</h3> {{-- Boton para activar participantes --}}
          <div class="icono">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
              <circle cx="9" cy="7" r="4" />
              <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
              <path d="M16 11h6m-3 -3v6" />
            </svg>
          </div>
          <a class="boton" href="{{url('participantes')}}">Ver</a>
          </section>

          <section class="servicio">
            <h3>Carreras</h3> {{-- Boton para  carreras --}}
            <div class="icono">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                <line x1="3" y1="6" x2="3" y2="19" />
                <line x1="12" y1="6" x2="12" y2="19" />
                <line x1="21" y1="6" x2="21" y2="19" />
              </svg>
            </div>
            <a class="boton" href="{{url('carreras')}}">Ver</a>
            </section>

            <section class="servicio">
              <h3>Rendimiento Matutino</h3> {{-- Boton para Rendimiento Matutino --}}
              <div class="icono">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <polyline points="3 17 9 11 13 15 21 7" />
                  <polyline points="14 7 21 7 21 14" />
                </svg>
              </div>
              <a class="boton" href="{{url('rendimientoM')}}">Ver</a>
              </section>

              <section class="servicio">
                <h3>Rendimiento Vespertino</h3> {{-- Boton para Rendimiento despertino --}}
                <div class="icono">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trending-up" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="3 17 9 11 13 15 21 7" />
                    <polyline points="14 7 21 7 21 14" />
                  </svg>
                </div>
                <a class="boton"  href="{{url('rendimientoV')}}">Ver</a>
                </section>

                <section class="servicio">
                <h3>Perfil Estudiantes</h3> {{-- Boton para Perfil de Estudiantes --}}
                <div class="icono">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="72" height="72" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <circle cx="9" cy="7" r="4" />
                  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                  <path d="M16 11h6m-3 -3v6" />
                  </svg>
                </div>
                <a class="boton" href="{{url('perfil')}}">Ver</a>
                </section>

  </div>
</main>
@endsection

@section('script')
@endsection