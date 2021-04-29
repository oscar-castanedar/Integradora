@extends('layouts.master')

@include('layouts.barraDocente')
@section('contenido')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Curso creado</title>
</head>
<body>

    <main class="container">
    <div class="container-fluid">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                      Parcial 1
                    </button>
                  </h2>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="button">Agregar Actividad</button>
                        @foreach($cursos as $curso )
                        <a class="nav-link" href="{{url('crearExam',['id'=>$curso->id])}}"> <button class="btn btn-primary" type="button">Agregar Examen</button></a>
                        @endforeach
                        <button class="btn btn-primary" type="button">Agregar Tarjeta</button>
                        <button class="btn btn-primary" type="button">Agregar Contenido</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                      Parcial 2
                    </button>
                  </h2>
                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-primary me-md-2" type="button">Agregar Actividad</button>
                        @foreach($cursos as $curso )
                        <a class="nav-link" href="{{url('crearExam',['id'=>$curso->id])}}"> <button class="btn btn-primary" type="button">Agregar Examen</button></a>
                        @endforeach
                        <button class="btn btn-primary" type="button">Agregar Tarjeta</button>
                        <button class="btn btn-primary" type="button">Agregar Contenido</button>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                      Parcial 3
                    </button>
                  </h2>
                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                       <button class="btn btn-primary me-md-2" type="button">Agregar Actividad</button>
                        @foreach($cursos as $curso )
                        <a class="nav-link" href="{{url('crearExam',['id'=>$curso->id])}}"> <button class="btn btn-primary" type="button">Agregar Examen</button></a>
                        @endforeach
                        <button class="btn btn-primary" type="button">Agregar Tarjeta</button>
                        <button class="btn btn-primary" type="button">Agregar Contenido</button>
                    </div>
                    </div>
                </div>
                </div>
              </div>
        </div>
    </main>
    <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
@endsection