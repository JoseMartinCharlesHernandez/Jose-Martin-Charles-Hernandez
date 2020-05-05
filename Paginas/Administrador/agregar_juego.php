<?php
$controlador = new Controlador();
$datosPlataformas = array();
$datosPlataformas = $controlador -> obtenerDatosPlataformas();
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
        if($_GET['e'] == 'successGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'success',
                title: 'Guardado con exito',
                text: 'Consola guardado con exito'
                }) </script> ";
        }
        if($_GET['e'] == 'errorGuardar'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo un erorr al guardar los datos'
                }) </script> ";
        }
    }
?>


<section class="content-header">
    <h1>
        Agregar Juego
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Juegos </a></li>
        <li class="active">Agregar Juego</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos del nuevo juego</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombreJuego">Nombre del juego: </label>
                        <input type="text" class="form-control" name="nombreJuego" placeholder="Numero del juego">
                    </div>
                    <div class="form-group">
                        <label for="plataforma">Plataforma: </label>
                        <select class="form-control" name="plataforma">
                            <?php
                                for($i = 0; $i < count($datosPlataformas); $i++ ){
                                    echo '<option value="'.$datosPlataformas[$i]['id'].'"> '. $datosPlataformas[$i]['nombre'] .' </option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar datos del juego" /> </center>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

</section>

<?php
if(isset($_POST['nombreJuego']) ){
    $controlador ->  guardarDatosJuego();
}
?>