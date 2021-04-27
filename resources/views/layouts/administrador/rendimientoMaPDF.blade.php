<!DOCTYPE html>
<html lang="en">
<head>
    <style>
	h2 {font-size:46px;margin:0 0 10px 0}
	p {margin:0 0 10px 0}
	
	table.width200,table.rwd_auto {border:1px solid #ccc;width:100%;margin:0 0 50px 0}
		.width200 th,.rwd_auto th {background:#ccc;padding:5px;text-align:center;}
		.width200 td,.rwd_auto td {border-bottom:1px solid #ccc;padding:5px;text-align:center}
		.width200 tr:last-child td, .rwd_auto tr:last-child td{border:0}
		
	.rwd {width:100%;overflow:auto;}
		.rwd table.rwd_auto {width:auto;min-width:100%}
			.rwd_auto th,.rwd_auto td {white-space: nowrap;}
			
	@media only screen and (max-width: 760px), (min-width: 768px) and (max-width: 1024px)  
	{
	
		table.width200, .width200 thead, .width200 tbody, .width200 th, .width200 td, .width200 tr { display: block; }
		
		.width200 thead tr { position: absolute;top: -9999px;left: -9999px; }
		
		.width200 tr { border: 1px solid #ccc; }
		
		.width200 td { border: none;border-bottom: 1px solid #ccc; position: relative;padding-left: 50%;text-align:left }
		
		.width200 td:before {  position: absolute; top: 6px; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap;}
		
		.descarto {display:none;}
		.fontsize {font-size:10px}
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen and (min-width : 320px) and (max-width : 480px) 
	{
		body { width: 320px; }
		.descarto {display:none;}
	}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-width: 768px) and (max-width: 1024px) 
	{
		body { width: 495px; }
		.descarto {display:none;}
		.fontsize {font-size:10px}
	}
</style>
</head>
<body>
<h1 style="font-size:1.8em,margin:0px;"class="bold">Turno Matutino</h1>

<table class="rwd_auto fontsize">
            <thead>
                <tr>
                    <th scope="col">Carrera</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Nombre Alumno</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Cursos Inscrito</th>
                    <th style="text-align: center">Calificacion Parcial 1</th>
                    <th style="text-align: center">Calificacion Parcial 2</th>
                    <th style="text-align: center">Calificacion Parcial 3</th>
                </tr>
                </thead>
           <tbody>
        @foreach($carrera as $c)
        @foreach($grupo as $g)
        @foreach($g->alumnos as $gg)
        @foreach($usuario as $u)
        @foreach($curso as $cu)
        @foreach($cu->grupos as $cg)
        @foreach($parcial1 as $par)
        @foreach($examen1 as $ex1)
        @foreach($parcial2 as $par2)
        @foreach($examen2 as $ex2)
        @foreach($parcial3 as $par3)
        @foreach($examen3 as $ex3)
        
        @if($c->id == $g->id_carrera && $u->id == $gg)
        @if($g->nombre_grupo == $cg && $cu->status_curso == true)
        @if($ex1->id == $par->id_examen && $ex1->id_parcial == $par->id)
        @if($ex2->id == $par2->id_examen && $ex2->id_parcial == $par2->id )
        @if($ex3->id == $par3->id_examen && $ex3->id_parcial == $par3->id)
           <tr>
           
                    <th>{{$c->nombre_carrera}}</th>
                    <td>{{$g->nombre_grupo}}</td>
                    <td>{{$u->nombre}}</td>
                    <td>{{$u->primer_apellido}}</td>
                    <td>{{$u->segundo_apellido}}</td>
                    <td>{{$cu->nombre_curso}}</td>
                    @if($par->id_curso == $cu->id && $par2->id_curso == $cu->id && $par3->id_curso == $cu->id)
                    @if($ex1->id_alumno == $gg && $ex2->id_alumno == $gg && $ex3->id_alumno == $gg)
                    <td style="text-align: center">{{$ex1->titulo}}: Calificacion:{{$ex1->calificacion}}</td>
                    <td style="text-align: center">{{$ex2->titulo}}: Calificacion:{{$ex2->calificacion}}</td>
                    <td style="text-align: center">{{$ex3->titulo}}: Calificacion:{{$ex3->calificacion}}</td>

                    @elseif($ex1->id_alumno != $gg && $ex2->id_alumno != $gg && $ex3->id_alumno != $gg)
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    <td td style="text-align: center">Examenes del parcial sin realizar</td>
                    @else
                    <td td td style="text-align: center">Sin calificacion</td>
                    <td td td style="text-align: center">Sin calificacion</td>
                    <td td td style="text-align: center">Sin calificacion</td>
                    @endif
                    @endif

                </tr>
                @endif
                @endif
                @endif
                @endif
                @endif
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach 
        @endforeach
       @endforeach
       @endforeach
            </tbody>
</table>
</div>
</body>
</html>