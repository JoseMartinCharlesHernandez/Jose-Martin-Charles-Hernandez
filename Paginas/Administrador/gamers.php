<?php
$controlador = new Controlador();
$datosSocios = array();
$datosSocios = $controlador -> obtenerDatosSocios();
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
        Socios gamers registrados en el sistema
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Socios Gamers </a></li>
        <li class="active"> Lista de Socios </li>
    </ol>

</section>

<!-- Main content -->
<section class="content">
<div class="box box-primary">
<div class="box">
    <div class="box-body">
        <table id="tabla" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Genero</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Gamer Tag</th>
                    <th>Modenas</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //La tabla es llenada dinamicamente creando una nueva fila por cada registro en la tabla, toda la ifnormacion que aqui se despliega se trajo desde el controler con el metodo anteriormente definido
                    for($i=0; $i < count($datosSocios); $i++ ){
                        echo '<tr>';
                            echo '<td>'. $datosSocios[$i]['nombre'] .'</td>';
                            echo '<td>'. $datosSocios[$i]['fecha_nacimiento'] .'</td>';
                            if( $datosSocios[$i]['genero'] == "F" ){
                                echo '<td> Femenino </td>';
                            }else{
                                echo '<td> Masculino </td>';
                            }
                            echo '<td>'. $datosSocios[$i]['telefono'] .'</td>';
                            echo '<td>'. $datosSocios[$i]['correo'] .'</td>';
                            echo '<td>'. $datosSocios[$i]['tag'] .'</td>';
                            echo '<td>'. $datosSocios[$i]['monedas'] .'</td>';
                            echo '<td> <a href="inicio.php?action=editar_gamer&id='.$datosSocios[$i]['id'].'" type="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a> </td>';
                            echo '<td>  <a href="inicio.php?action=gamers&accion=eliminar_gamer&id='.$datosSocios[$i]['id'].'" type="button"  class="btn btn-danger"> <i class="fas fa-trash-alt"></i>  </a> </td>';
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
    if( $_GET['accion'] == "eliminar_gamer"){
        $controlador -> eliminarGamer();
    }
}
?>