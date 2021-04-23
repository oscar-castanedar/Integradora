<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:400,700" rel="stylesheet">
    {{-- Estilos de la constancia--}}
    <style>
    html, body{ height: 70;}
    body{
        background-color:#FFFFFF;
        background-size: 100%, 100%;
        font-family: 'Poppins';
        font-weight: 300;
        height: 100%;
        text-align: center;
        color:#6C6968;
    }
    .left{
    float:left;
    text-align:left;
    margin-left: 100px;
    color:#FAF8F7;
    }
    .right{
        float:right;
        text-align:right;
    margin-right: 100px;
    color:#FAF8F7;
    }
    .bold{
        font-weight: 300;
    }
</style>
{{-- Contenido de la constancia --}}
<div class="left">
    <img src="img/cbtis.jpg" style="width: 150px;height:100px;" >
    
    </div>
    <br>
    <div class="right">
    <img src="img/SEP.jpg"style="width: 150px;height:100px;" >
    </div>
</head>
<br>
<body>
    <div style="padding-top:100px;">
    <p style="font-size:1.4em;color:#000000;" class="light">Centro de Bachillerato Tecnologico industrial y de servicios no.75</p>
    <p style="font-size:1.0em;color:#000000;" class="light">"Miguel Hidalgo y Costilla"</p>
    <h1 style="font-size:3.8em;color:#000000;margin:0px;"class="bold">Constancia</h1>
    <h2 style="font-size:1.0em;color:#000000;margin:0px;" class="bold">conclusión del curso</h2>
    <p style="margin-bottom:0px;color:#000000;margin-top:25px;" class="light">Certfica a:</p>
    <p style="font-size:2.4em;color:#000000;margin:0px;"class="bold">{{$nombre}} {{$ap}} {{$am}}</p>
    <br>
    <p style="margin:0px;color:#000000"> Por completar el curso: </p>
    @foreach($curso as $c)
    <h2 style="max-width:600px;margin:25px auto;font-size:3em;color:#000000"class="bold">{{$c->nombre_curso}} </h2>
    @endforeach
</div>
<footer>
<div class="left">
    <img src="img/firma.png" style="width: 150px;height:100px;" >
    </div>
    <br>
    <div style="color:#000000" class="right">
     Fecha: {{$fecha}}
    </div>
</footer>
</body>
</html>