<?php

class Modelo
{
    public function mostrarPagina($enlace){
        if($_SESSION['tipoUsuario'] != 'Socio'){
            if( $enlace == "dashboard" || 
                $enlace == "salir" ||
                $enlace == "consolas" || 
                $enlace == "agregar_consola" ||
                $enlace == "editar_consola" ||
                $enlace == "gamers" ||
                $enlace == "agregar_gamers" ||
                $enlace == "editar_gamer" ||
                $enlace == "juegos" ||
                $enlace == "agregar_juego" ||
                $enlace == "editar_juego" || 
                $enlace == "torneos"){
                $pagina = "Paginas/Administrador/". $enlace .".php";
            } else if($enlace == "index"){
                $pagina = "Paginas/Administrador/dashboard.php";
            }else{
                $pagina = "Paginas/Administrador/dashboard.php";
            }
        }else{
            if( $enlace == "dashboard_socio" ||
                $enlace == "salir" ||
                $enlace == "torneos_disponibles" ||
                $enlace == "mis_torneos" ) {
                $pagina = "Paginas/Socio/". $enlace .".php";
            } else if($enlace == "index"){
                $pagina = "Paginas/Socio/dashboard_socio.php";
            } else{
                $pagina = "Paginas/Socio/dashboard_socio.php";
            }
        }
        return $pagina;
    }

}