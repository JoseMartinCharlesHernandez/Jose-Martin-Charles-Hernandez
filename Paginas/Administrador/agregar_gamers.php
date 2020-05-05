<?php
$controlador = new Controlador();
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
                text: 'Gamer guardado con exito'
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

        if($_GET['e'] == 'noCoincideContrasena'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No coinciden las contraseñas'
                }) </script> ";
        }

        

    }
?>


<section class="content-header">
    <h1>
        Agregar Socio Gamer
    </h1>
    
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Socios Gamers </a></li>
        <li class="active"> Agregar Socio Gamer </li>
    </ol>
</section>

<!-- Main content -->
<section class="content">


<div class="row">

    <div class="col-md-12">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Agregue los datos de la persona</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" enctype="multipart/form-data">
                
                <div class="box-body">

                <div class="form-group has-feedback">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" placeholder="Nombre completo" name="nombre">
                </div>

                <div class="form-group has-feedback">
                    <label for="fecha">Fecha de nacimiento: </label>                                           
                    <input type="text" placeholder="Fecha de nacimiento" class="form-control" id="datepicker" name="fecha">
                </div>

                <div class="form-group has-feedback">
                    <label for="tag"> Gamer Tag: </label>
                    <input type="text" class="form-control" placeholder="Gamer Tag" name="tag">
                </div>

                <div class="form-group has-feedback">
                    <label for="telefono">Telefono: </label>
                    <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                </div>

                <div class="form-group has-feedback">
                    <label for="sexo">Sexo: </label>
                    <select class="form-control" placeholder="Sexo" name="sexo"> 
                        <option value="M"> Masculino </option>
                        <option value="F"> Femenino </option>
                    </select>
                </div>

                <div class="form-group has-feedback">
                    <label for="correo">Correo: </label>
                    <input type="email" class="form-control" placeholder="Correo Electronico" name="correo">
                </div>
        
                <div class="form-group has-feedback">
                    <label for="contrasena">Contraseña: </label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                </div>

                <div class="form-group has-feedback">
                    <label for="repContrasena">Repetir contrasena: </label>
                    <input type="password" class="form-control" placeholder="Repite contraseña" name="repContrasena">
                </div>
                
                </div>
                <div class="box-footer">
                <center> <input type="submit" class="btn btn-primary btn-lg btn-block" value="Guardar datos del socio" /> </center>
                </div>
                
            </form>

        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

</section>

<?php

if(isset($_POST['nombre']) ){
    $controlador ->  agregarGamer();
}

?>