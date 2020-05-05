<?php
$controlador = new Controlador();
$datosTorneos = array();
$datosTorneos = $controlador -> obtenerDatosTorneos();



?>

<?php
    if(isset($_GET['e']) ){

        if($_GET['e'] == 'camposVacios'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Debe llenar todos los campos'
                }) </script> ";
        }

        if($_GET['e'] == 'successEditar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Guardado con exito',
                text: 'Datos editados con exito'
                }) </script> ";
        }

        if($_GET['e'] == 'errorEditar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al guardar los datos'
                }) </script> ";
        }


        if($_GET['e'] == 'successEliminar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Datos eliminados',
                text: 'Datos eliminados con exito'
                }) </script> ";
        }

        if($_GET['e'] == 'errorEliminar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al eliminar los datos'
                }) </script> ";
        }


        if($_GET['e'] == 'successGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Registrado al torneo',
                text: 'Registrado correctamente al torneo'
                }) </script> ";
        }

        if($_GET['e'] == 'errorGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo registrar al torneo'
                }) </script> ";
        }



    }
?>


<section class="content-header">
    <h1>
        Torneos disponibles
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Torneos </a></li>
        <li class="active"> Torneos disponibles </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">


<div class="box box-primary">

<div class="box">



    <!-- /.box-header -->
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!--Columnas de la cabecera de la tabla-->
                    <th>Titulo</th>
                    <th>Juego</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Modalidad</th>
                    <th>Forma</th>
                    <th>Total de jugadores</th>
                    <th>Descripcion</th>
                    <th>Estatus</th>
                    <th>Registrarse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
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

                            echo '<td> <a href="inicio.php?action=torneos_disponibles&accion=registrarTorneo&id='.$datosTorneos[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>
</section>


<?php
if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "registrarTorneo"){
        $controlador -> registrarGamerEnTorneo();
    }
}
?>