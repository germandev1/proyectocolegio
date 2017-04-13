<html>
<head>

</head>
<!-- Tell the browser to be responsive to screen width -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- Bootstrap 3.3.5 -->
<style>

    <?php include(public_path() . '/assets/css/bootstrap.css');?>
    <?php include(public_path() . '/assets/dist/css/AdminLTE.css');?>
    <?php include(public_path() . '/assets/dist/css/skins/_all-skins.css');?>
    <?php include(public_path() . '/assets/css/font-awesome.css');?>

@page teacher {
        size: A4 portrait;
        margin: 2cm;
    }

    .teacherPage {
        page: teacher;
        page-break-after: always;
    }

   .text-rotation {display: block;
       -webkit-transform: rotate(-90deg);
       -moz-transform: rotate(-90deg);
   }


</style>

<style>
    .Rotate-90
    {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);




        position: relative;
        left:75px;


    }
    .ajustar{
        height: 200px;
        width: 80px;
        float: left;
        white-space: pre; /* CSS 2.0 */
        white-space: pre-wrap; /* CSS 2.1 */
        white-space: pre-line; /* CSS 3.0 */
        white-space: -pre-wrap; /* Opera 4-6 */
        white-space: -o-pre-wrap; /* Opera 7 */
        white-space: -moz-pre-wrap; /* Mozilla */
        white-space: -hp-pre-wrap; /* HP */
        word-wrap: break-word; /* IE 5+ */
    }
</style>

<body style="height: 300px;!important; background: white;">

<?php $nVueltas = 0; ?>
@foreach($alumnos as $alumno)
    @if($nVueltas==0)
        <?php $nVueltas = 1;?>
    @elseif($nVueltas>375)
        <?php break; ?>
    @else
        <hr>
    @endif
    <div class="row teacherPage">
        <div class="col-md-12">

                <h2 class="text-center"><img src="http://colegiolocal.com/img/indexes/logo.jpg" alt="" height="100" width="100"><br></h2>
                <h2 class="page-header text-center" id="titulo">Colegio San Juan Bautista<br><br></h2>
                    <h5>{{$alumno->user->nombre}} {{$alumno->user->apellido}}</h5>

                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Asignatura</th>
                                <th rowspan="0"><label class="Rotate-90 ajustar">Revision de Cuaderno</label></th>
                                <th>Puntaje</th>
                                <th>Act. Complementarias</th>
                                <th>Puntaje</th>
                                <th>Act. Integradora</th>
                                <th>Puntaje</th>
                                <th>Prueba Objetiva Examen 30%</th>
                                <th>Puntaje</th>
                                <th>Promedio del Periodo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($alumno->matriculas[0]->gradoseccion->materiagrados as $materiagrado)
                            <tr>
                                <td>{{$materiagrado->materium->nombre}}</td>

                                <?php
                                    $rev = false;
                                    $com= false;
                                $int= false;
                                    $exa= false;
                                $revision=NULL;
                                $complementarias =NULL;
                                $integradoras=NULL;
                                $examen =NULL;?>
                                @foreach($materiagrado->notas as $nota)

                                    @if($nota->idMateriaGrado == $materiagrado->id)
                                        @if($nota->idEstudiante == $alumno->id)
                                        @if($nota->idTipoNota==1)

                                                <td>{{$nota->nota}}</td>
                                                <td><?php
                                                        $rev=true;
                                                    $revision= round($nota->nota*0.15,2);
                                                    echo $revision?></td>

                                        @endif
                                        @if($nota->idTipoNota==2)

                                                <td>{{$nota->nota}}</td>
                                                <td><?php
                                                    $com= true;
                                                    $complementarias=round($nota->nota*0.20,2);
                                                    echo $complementarias ;?></td>

                                        @endif
                                        @if($nota->idTipoNota==3)

                                                <td>{{$nota->nota}}</td>
                                                <td><?php
                                                    $int= true;
                                                    $integradoras =round($nota->nota*0.35,2);
                                                    echo $integradoras;?></td>

                                        @endif
                                        @if($nota->idTipoNota==4)

                                                <td>{{$nota->nota}}</td>
                                                <td><?php
                                                        $exa=true;
                                                    $examen =round($nota->nota*0.30,2);
                                                    echo $examen?></td>

                                        @endif

                                    @endif
                                    @endif


                                @endforeach
                                @if($rev==false && $com==false && $int==false && $exa==false)
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td><b>0</b></td>
                                @else
                                    <td><b><?php $promedio = $revision+$complementarias+$integradoras+$examen;
                                        echo $promedio?></b>
                                @endif

                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td>Conducta</td>
                                <td colspan="8"></td>

                                <td>0%</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    <?php $nVueltas++?>


@endforeach
</body>
</html>