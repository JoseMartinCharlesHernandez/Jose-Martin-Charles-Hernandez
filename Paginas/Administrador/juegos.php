<?php

$controlador = new Controlador();
$datosJuegos = array();
$datosJuegos = $controlador -> obtenerDatosJuegos();

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



    }
?>


<section class="content-header">
    <h1>
        Videojuegos registrados en el sistema
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Juegos </a></li>
        <li class="active"> Lista de Juegos </li>
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
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Plataforma</th>
                    
                    <!--<th>Modificar</th>
                    <th>Eliminar</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosJuegos); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosJuegos[$i]['id'] .'</td>';
                            echo '<td>'. $datosJuegos[$i]['titulo'] .'</td>';
                            echo '<td>'. $datosJuegos[$i]['nombre'] .'</td>';
                           
                            //echo '<td> <a href="inicio.php?action=editar_consola&id='.$datosConsolas[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            
                            //echo '<td>  <a href="inicio.php?action=consolas&accion=eliminar_consola&id='.$datosConsolas[$i]['id'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
                        echo '</tr>';
                    }
                
                ?>
            </tbody>
        </table>
    </div>
</div>

    

</section>


<?php

//Valida que se accion el metodo solo si se hace clic en el boton y no cuando se cargue pagina
/*if(isset($_GET['accion'])) {
    if( $_GET['accion'] == "eliminar_consola"){
        $controlador -> eliminarConsola();
    }
}*/

?>