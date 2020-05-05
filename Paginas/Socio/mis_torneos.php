<?php
$controlador = new Controlador();
$datosTorneos = array();
$datosTorneos = $controlador -> obtenerDatosTorneosDelGamer();

?>


<section class="content-header">
    <h1>
        Mis torneos
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Torneos </a></li>
        <li class="active"> Mis torneos </li>
    </ol>
</section>

<section class="content">
<div class="box box-primary">
<div class="box">
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Juego</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Modalidad</th>
                    <th>Forma</th>
                    <th>Total de jugadores</th>
                    <th>Descripcion</th>
                    <th>Estatus</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for($i=0; $i < count($datosTorneos); $i++ ){
                        echo '<tr>';
                        echo '<td>'. $datosTorneos[$i]['tituloTorneo'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['titulo'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['fecha'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['hora'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['modalidad'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['forma'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['cantidad_jugadores'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['descripcion'] .'</td>';
                        echo '<td>'. $datosTorneos[$i]['estatus'] .'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</section>