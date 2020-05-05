<?php

$controlador = new Controlador();

$datosSocio = array();
$datosSocio = $controlador -> obtenerDatosGamer();

?>

<?php
    if(isset($_GET['e']) ){

        if($_GET['e'] == 'noCoincideContrasena'){
            echo " <!-- Sweet alert -->
            <script> Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No coincide la contraseña'
                }) </script> ";
        }

    }
?>


<section class="content-header">
    <h1>
        Editar Socio Gamer
    </h1>
        <br>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Socios Gamer </a></li>
        <li class="active">Editar Socios Gamer</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<div class="row">

    <div class="col-md-10">

        <!-- general form elements -->
        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Edite los datos del socio gamer</h3>
            </div>

            <form role="form" method='post' >
                
                <div class="box-body">


                    <div class="form-group has-feedback">
                        <label for="nombre">Nombre: </label>
                        <input type="text" class="form-control" placeholder="Nombre completo" name="nombre" value="<?= $datosSocio[0]['nombre'] ?>">
                    </div>

                    <div class="form-group has-feqedback">
                        <label for="fecha">Fecha de nacimiento: </label>                                           
                        <input type="text" placeholder="Fecha de nacimiento" class="form-control" id="datepicker" name="fecha" value="<?= $datosSocio[0]['fecha_nacimiento'] ?>">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="tag"> Gamer Tag: </label>
                        <input type="text" class="form-control" placeholder="Gamer Tag" name="tag" value="<?=$datosSocio[0]['tag']?>">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="telefono">Telefono: </label>
                        <input type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?=$datosSocio[0]['telefono']?>">
                    </div>

                    <div class="form-group has-feedback">
                        <label for="sexo">Sexo: </label>
                        <select class="form-control" placeholder="Sexo" name="sexo" value="<?=$datosSocio[0]['sexo']?>"> 
                            <option value="M"> Masculino </option>
                            <option value="F"> Femenino </option>
                        </select>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="correo">Correo: </label>
                        <input type="email" class="form-control" placeholder="Correo Electronico" name="correo" value="<?=$datosSocio[0]['correo']?>">
                    </div>
            
                    <p> Si quiere cmbiar la constraseña, llene estos campos </p>
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
                        <center> <button type="submit" class="btn btn-primary">Guardar Datos</button> </center>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

</section>


<?php

//Toda la informacion la cacha el metodo del controlador para editar los datos del usuario que se le paso como parametro GET la matricula
if(isset($_POST['nombre'])){
        
    $controlador -> editarDatosGamer();

}

?>