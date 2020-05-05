<?php

class Controlador
{
    private $enlace = '';
    private $pagina = '';

    public function cargarPlantilla() {
        session_start();
        if( isset($_SESSION['iniciada']) ){
            include 'Paginas/plantilla.php';
        }else{
            $pagina = $_GET['p'];
            if($pagina == 'registrarse'){
                include 'signup.php';
            } else if($pagina == 'iniciarSesion'){
                include 'login.php';
            }else{
                if( $pagina == 'contraincorrecta'){
                    include 'login.php';
                }
            }
        }
    }

    public function mostrarPagina() {
        if(isset($_GET['action'])){
            $enlace = $_GET['action'];
        }else{
            if($_SESSION['tipoUsuario'] == 'Socio'){
                $enlace = 'dashboard_socio';
            }else{
                $enlace = 'dashboard';
            }
        }
        $pagina = Modelo::mostrarPagina($enlace);
        include $pagina;
    }

    public function iniciarSesion() {
        if( isset($_POST['correo']) && isset( $_POST['contrasena'] ) && isset($_POST['tipoUsuario']) )
        {
            $datos = array( 'correo'      => $_POST['correo'],
                            'contrasena'  => $_POST['contrasena'],
                            'tipoUsuario' => $_POST['tipoUsuario'] );
            
            if($datos['tipoUsuario'] == 'Administrador' ){
                $respuesta = Datos::validarUsuario($datos, 'usuarios');
            }else{
                $respuesta = Datos::validarUsuario($datos, 'socios');
            }
            if( $respuesta ){
                if( $datos['tipoUsuario'] == 'Administrador' ){
                    $tipoUsuario = $respuesta['rol'];
                    $idUsuario = $respuesta['id'];
                }else{
                    $tipoUsuario = 'Socio';
                    $idUsuario = $respuesta['id'];
                }
                session_start();
                $_SESSION['iniciada'] = true;
                $_SESSION['nombre'] = $respuesta['nombre'];
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['idUsuario'] = $idUsuario;
                
                header("location:inicio.php?action=dashboard");
            }else
            {
                header("location:inicio.php?p=contraincorrecta");
            }
        }
    }

    public function registrarSocio(){
        if(isset($_POST['nombre'])){
            $nombre_usuario = $_POST['nombre'];
            $game_tag = $_POST['tag'];
            $correo_usuario=$_POST['correo'];
            $contra_usuario=$_POST['contrasena'];
            $repContrasena = $_POST['repContrasena'];
            $fechaNacimiento = $_POST['fecha'];
            $telefono = $_POST['telefono'];
            $sexo = $_POST['sexo'];
            if(  empty($_POST['telefono']) || empty($_POST['fecha']) || empty($_POST['nombre']) || empty($_POST['tag']) || empty($_POST['correo']) || empty($_POST['contrasena']) || empty($_POST['repContrasena']) ){
                header("location: inicio.php?p=registrarse&e=camposVacios");
            }else{
                if( $contra_usuario == $repContrasena ){
                    $datos = array( 'nombre_usuario'=>$nombre_usuario,
                                    'game_tag'=>$game_tag,
                                    'correo_usuario'=>$correo_usuario,
                                    'contra_usuario'=>$contra_usuario,
                                    'fecha_nacimiento' => $fechaNacimiento,
                                    'telefono' => $fechaNacimiento,
                                    'sexo' => $sexo );
                    $respuesta = Datos::registrarSocioModel($datos, 'socios');
                    if($respuesta == "success"){
                        header("location: inicio.php?p=iniciarSesion&e=recienRegistrado");
                    }else{
                        header("location: inicio.php?p=registrarse&e=errorAlGuardar");
                    }
                }else{
                    header("location: inicio.php?p=registrarse&e=noCoincideContrasena");
                }
            }
        }
    }

    /***  ADMINISTRACION DE CONSOLAS ***/
    public function obtenerDatosPlataformas(){
        $datosDePlataformas = array();
        $datosDePlataformas = Datos::traerDatosPlataformas();
        return $datosDePlataformas;
    }

    public function guardarDatosConsola(){
        if( empty($_POST['totalMonedas']) || empty($_POST['numeroConsola']) || empty($_POST['serialConsola']) || empty($_POST['costoRenta']) ){
            echo '<script> 
                    window.location.href = "inicio.php?action=agregar_consola&e=camposVacios";
                  </script>';
        }else{
            $nombreConsola = $_POST['plataforma'];
            $numeroConsola = $_POST['numeroConsola'];
            $serialConsola = $_POST['serialConsola'];
            $costoRenta = $_POST['costoRenta'];
            $totalMonedas = $_POST['totalMonedas'];
            $datosConsola = array('plataformaConsola' => $nombreConsola,
                            'numeroConsola' => $numeroConsola,
                            'serialConsola' => $serialConsola,
                            'costoRenta' => $costoRenta,
                            'totalMonedas' => $totalMonedas );
            $respuesta = Datos::guardarDatosConsola($datosConsola, "consolas");
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=agregar_consola&e=successGuardar";
                      </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=agregar_consola&e=errorGuardar";
                      </script>';
            }
        }  
    }

    public function obtenerDatosconsolas(){
        $datosDeConsolas = array();
        $datosDeConsolas = Datos::traerDatosConsolas();
        return $datosDeConsolas;
    }

    public function obtenerDatosconsola() {
        $idConsola = $_GET['id'];
        $datosDeConsola = array();
        $datosDeConsola = Datos::traerDatosConsola($idConsola);
        return $datosDeConsola;
    }

    public function editarDatosConsola() {
        if( empty($_POST['totalMonedas']) || empty($_POST['numeroConsola']) || empty($_POST['serialConsola']) || empty($_POST['costoRenta']) ){
            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=camposVacios";
                  </script>';
        }else{
            $idConsola = $_GET['id'];
            $nombreConsola = $_POST['plataforma'];
            $numeroConsola = $_POST['numeroConsola'];
            $serialConsola = $_POST['serialConsola'];
            $costoRenta = $_POST['costoRenta'];
            $totalMonedas = $_POST['totalMonedas'];
            $datosConsola = array('plataformaConsola' => $nombreConsola,
                            'numeroConsola' => $numeroConsola,
                            'serialConsola' => $serialConsola,
                            'costoRenta' => $costoRenta,
                            'totalMonedas' => $totalMonedas,
                            'id' => $idConsola );
            $respuesta = Datos::editarDatosConsola($datosConsola, "consolas");
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=consolas&e=successEditar";
                        </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=consolas&e=errorEditar";
                        </script>';
            }
        }
    }

    public function eliminarConsola(){
        $matriculaAlumno = $_GET['id'];
        $respuesta = Datos::eliminarDatosConsola($matriculaAlumno, "consolas");        
        if($respuesta == "success"){
            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=successEliminar";
                  </script>';
        }else{
            echo '<script> 
                    window.location.href = "inicio.php?action=consolas&e=errorEliminar";
                  </script>';
        }
    }

    /**  ADMINISTRACION DE GAMERS **/
    public function agregarGamer(){
        if(isset($_POST['nombre'])){
            $nombre_usuario = $_POST['nombre'];
            $game_tag = $_POST['tag'];
            $correo_usuario=$_POST['correo'];
            $contra_usuario=$_POST['contrasena'];
            $repContrasena = $_POST['repContrasena'];
            $fechaNacimiento = $_POST['fecha'];
            $telefono = $_POST['telefono'];
            $sexo = $_POST['sexo'];
            if(  empty($_POST['telefono']) || empty($_POST['fecha']) || empty($_POST['nombre']) || empty($_POST['tag']) || empty($_POST['correo']) || empty($_POST['contrasena']) || empty($_POST['repContrasena']) ){
                header("location: inicio.php?action=agregar_gamers&e=camposVacios");
            }else{
                if( $contra_usuario == $repContrasena ){
                    $datos = array( 'nombre_usuario'=>$nombre_usuario,
                                    'game_tag'=>$game_tag,
                                    'correo_usuario'=>$correo_usuario,
                                    'contra_usuario'=>$contra_usuario,
                                    'fecha_nacimiento' => $fechaNacimiento,
                                    'telefono' => $fechaNacimiento,
                                    'sexo' => $sexo );
                    $respuesta = Datos::registrarSocioModel($datos, 'socios');
                    if($respuesta == "success"){
                        echo '<script>
                                window.location.href = "inicio.php?action=agregar_gamers&e=successGuardar";
                              </script>';
                    }else{
                        echo '<script>
                                window.location.href = "inicio.php?action=agregar_gamers&e=errorGuardar";
                              </script>';
                    }
                }else{
                    header("location: inicio.php?action=agregar_gamers&e=noCoincideContrasena");
                }
            }
        }
    }

    public function obtenerDatosSocios(){
        $datosDeSocios = array();
        $datosDeSocios = Datos::traerDatosSocios();
        return $datosDeSocios;
    }


    public function obtenerDatosGamer() {
        $idGamer = $_GET['id'];
        $datosDeGamer = array();
        $datosDeGamer = Datos::traerDatosSocio($idGamer);
        return $datosDeGamer;
    }


    public function editarDatosGamer() {

        if(isset($_POST['nombre'])){

            $idGamer = $_GET['id'];
            $nombre_usuario = $_POST['nombre'];
            $game_tag = $_POST['tag'];
            $correo_usuario=$_POST['correo'];
            $contra_usuario=$_POST['contrasena'];
            $repContrasena = $_POST['repContrasena'];
            $fechaNacimiento = $_POST['fecha'];
            $telefono = $_POST['telefono'];
            $sexo = $_POST['sexo'];

            if(  empty($_POST['telefono']) || empty($_POST['fecha']) || empty($_POST['nombre']) || empty($_POST['tag']) || empty($_POST['correo'])  ){
                header("location: inicio.php?action=gamers&e=camposVacios");
            }else{
                if( $contra_usuario == $repContrasena ){
                    $datos = array( 'nombre_usuario'=>$nombre_usuario,
                                    'game_tag'=>$game_tag,
                                    'correo_usuario'=>$correo_usuario,
                                    'contra_usuario'=>$contra_usuario,
                                    'fecha_nacimiento' => $fechaNacimiento,
                                    'telefono' => $fechaNacimiento,
                                    'sexo' => $sexo,
                                    'id' => $idGamer );

                    $respuesta = Datos::editarDatossGamer($datos, 'socios');
                    

                    if($respuesta == "success"){
                        echo '<script>
                                window.location.href = "inicio.php?action=gamers&e=successEditar";
                              </script>';
                    }else{
                        echo '<script>
                                window.location.href = "inicio.php?action=gamers&e=errorEditar";
                              </script>';
                    }
                }else{
                    header("location: inicio.php?action=editar_gamer&e=noCoincideContrasena");
                }
            }
        }
    }

    public function eliminarGamer(){
        $idGamer = $_GET['id'];
        $respuesta = Datos::eliminarDatosGamer($idGamer, "socios");        
        if($respuesta == "success"){
            echo '<script> 
                    window.location.href = "inicio.php?action=gamers&e=successEliminar";
                  </script>';
        }else{
            echo '<script> 
                    window.location.href = "inicio.php?action=gamers&e=errorEliminar";
                  </script>';
        }
    }


    
    /*** ADMINISTRACION DE JUEGOS ***/
    public function guardarDatosJuego(){
        if( empty($_POST['nombreJuego']) || empty($_POST['plataforma']) ){
            echo '<script> 
                    window.location.href = "inicio.php?action=agregar_juego&e=camposVacios";
                  </script>';
        }else{
            $nombreJuego = $_POST['nombreJuego'];
            $plataforma = $_POST['plataforma'];
            $datosJuego = array('nombreJuego' => $nombreJuego,
                                'plataforma' => $plataforma );
            $respuesta = Datos::guardarDatosJuego($datosJuego, "juegos");
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=juegos&e=successGuardar";
                      </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=juegos&e=errorGuardar";
                      </script>';
            }
        }  
    }

    public function obtenerDatosJuegos(){
        $datosDeConsolas = array();
        $datosDeConsolas = Datos::traerDatosJuegos();
        return $datosDeConsolas;
    }
    

    public function traerDatosJuego() {
        $idConsola = $_GET['id'];
        $datosDeConsola = array();
        $datosDeConsola = Datos::traerDatosConsola($idConsola);
        return $datosDeConsola;
    }

    public function editarDatosJuego() {
        if( empty($_POST['totalMonedas']) || empty($_POST['numeroConsola']) || empty($_POST['serialConsola']) || empty($_POST['costoRenta']) ){
            echo '<script> 
                    window.location.href = "inicio.php?action=juegos&e=camposVacios";
                  </script>';
        }else{
            $idConsola = $_GET['id'];
            $nombreConsola = $_POST['plataforma'];
            $numeroConsola = $_POST['numeroConsola'];
            $serialConsola = $_POST['serialConsola'];
            $costoRenta = $_POST['costoRenta'];
            $totalMonedas = $_POST['totalMonedas'];
            $datosConsola = array('plataformaConsola' => $nombreConsola,
                            'numeroConsola' => $numeroConsola,
                            'serialConsola' => $serialConsola,
                            'costoRenta' => $costoRenta,
                            'totalMonedas' => $totalMonedas,
                            'id' => $idConsola );
            $respuesta = Datos::editarDatosJuego($datosConsola, "juegos");
            if($respuesta == "success"){
                echo '<script>
                        window.location.href = "inicio.php?action=juegos&e=successEditar";
                        </script>';
            }else{
                echo '<script>
                        window.location.href = "inicio.php?action=juegos&e=errorEditar";
                        </script>';
            }
        }
    }

    public function eliminarJuego(){
        $idJuego = $_GET['id'];
        $respuesta = Datos::eliminarDatosJuego($idJuego, "juegos");        

        if($respuesta == "success"){
            echo '<script> 
                    window.location.href = "inicio.php?action=juegos&e=successEliminar";
                  </script>';
        }else{
            echo '<script> 
                    window.location.href = "inicio.php?action=juegos&e=errorEliminar";
                  </script>';
        }
    }


    /* ADMINISTRACION DE TORNEOS DEL SOCIO GAMER */
    public function obtenerDatosTorneos() {
        $datosDeTorneos = array();
        $datosDeTorneos = Datos::traerDatosTorneos();
        return $datosDeTorneos;
    }

    

    public function registrarGamerEnTorneo() {

        $datos = array( 'gamer'  =>  $_SESSION['idUsuario'],
                        'torneo' =>  $_GET['id'] );

        $respuesta = Datos::registrarGamerEnTorneo($datos);

        if($respuesta == "success"){
            echo '<script>
                    window.location.href = "inicio.php?action=torneos_disponibles&e=successGuardar";
                    </script>';
        }else{
            echo '<script>
                    window.location.href = "inicio.php?action=torneos_disponibles&e=errorGuardar";
                    </script>';
        }

    }

    public function obtenerDatosTorneosDelGamer() {
        $datosDeTorneos = array();
        $datosDeTorneos = Datos::traerDatosTorneosDelGamer();
        return $datosDeTorneos;
    }

}