<?php
require_once('conexion.php');

class Datos extends Conexion{

    public function validarUsuario($datos, $tabla){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo AND contrasena = md5(:contra) ");
        $stmt->bindParam(':correo', $datos['correo'], PDO::PARAM_STR);
        $stmt->bindParam(':contra', $datos['contrasena'], PDO::PARAM_STR);
        $stmt->execute();
        $r = array();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        return $r;
    }

    /* FUNCIONES PARA LA ADMINISTRADOR DE SOCIOS */

    public function registrarSocioModel($datosSocio, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, fecha_nacimiento, genero, telefono, correo, contrasena, tag) VALUES(:nombre, :fecha_nacimiento, :genero, :telefono, :correo, md5(:contrasena), :tag) ");
        $stmt->bindParam(":nombre", $datosSocio["nombre_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datosSocio["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datosSocio["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datosSocio["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosSocio["correo_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosSocio["contra_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":tag", $datosSocio["game_tag"], PDO::PARAM_STR);

        print_r($datosSocio);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    public function traerDatosSocios() {
        $stmt = Conexion::conectar()->prepare(" 
            SELECT * from socios
        ");

        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function traerDatosSocio($id){
        $stmt = Conexion::conectar()->prepare(" 
            SELECT * FROM socios WHERE id = :id;
        ");

        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function editarDatossGamer($datosSocio, $tabla){

        if( empty($_POST['contra_usuario'] ) || 
            $_POST['contra_usuario'] == "" || 
            $_POST['contra_usuario'] == null ){
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                SET nombre = :nombre, fecha_nacimiento = :fecha_nacimiento, genero = :genero, telefono = :telefono, correo = :correo, tag = :tag
                WHERE id = :id ");
        }else{

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                SET nombre = :nombre, fecha_nacimiento = :fecha_nacimiento, genero = :genero, telefono = :telefono, correo = :correo, contrasena = MD5(:contrasena), tag = :tag
                WHERE id = :id ");
            $stmt->bindParam(":contrasena", $datosSocio["contra_usuario"], PDO::PARAM_STR);
        }

        $stmt->bindParam(":nombre", $datosSocio["nombre_usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datosSocio["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":genero", $datosSocio["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datosSocio["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosSocio["correo_usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":tag", $datosSocio["game_tag"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datosSocio["id"], PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }


    public function eliminarDatosGamer($id, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");
        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }
    }



    /*******************  ADMINSITRACION DE CONSOLAS    ***************/
    public function traerDatosPlataformas() {
        $query = Conexion::conectar()->prepare("SELECT id, nombre FROM plataformas");
        $query->execute();
        $resultado = array();
        $resultado = $query->FetchAll();
        return $resultado;
    }

    public function guardarDatosConsola($datosConsola, $tabla){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( id_plataforma, numero, serial_consola, costo_renta, total_monedas) VALUES(:id_plataforma, :numero, :serial, :costo_renta, :total_monedas) ");
        $stmt->bindParam(":id_plataforma", $datosConsola["plataformaConsola"] , PDO::PARAM_INT);
        $stmt->bindParam(":numero", $datosConsola["numeroConsola"], PDO::PARAM_INT);
        $stmt->bindParam(":serial", $datosConsola["serialConsola"], PDO::PARAM_STR);
        $stmt->bindParam(":costo_renta", $datosConsola["costoRenta"], PDO::PARAM_INT);
        $stmt->bindParam(":total_monedas", $datosConsola["totalMonedas"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
    }

    public function traerDatosConsolas() {
        $stmt = Conexion::conectar()->prepare(" 
            SELECT consolas.id as id, consolas.id_plataforma as id_plataforma, consolas.numero as numero, consolas.serial_consola as serial_consola, consolas.costo_renta as costo_renta, consolas.total_monedas as total_monedas, plataformas.nombre as nombre_plataforma FROM consolas INNER JOIN plataformas ON consolas.id_plataforma = plataformas.id;
        ");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function traerDatosConsola($id){
        $stmt = Conexion::conectar()->prepare(" 
            SELECT consolas.id as id, consolas.id_plataforma as id_plataforma, consolas.numero as numero, consolas.serial_consola as serial_consola, consolas.costo_renta as costo_renta, consolas.total_monedas as total_monedas, plataformas.nombre as nombre_plataforma FROM consolas INNER JOIN plataformas ON consolas.id_plataforma = plataformas.id WHERE consolas.id = :id;
        ");

        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function editarDatosConsola($datosConsola, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET id_plataforma = :id_plataforma, numero = :numero, serial_consola = :serial, costo_renta = :costo_renta, total_monedas = :total_monedas
                                               WHERE id = :id ");

        $stmt->bindParam(":id_plataforma", $datosConsola["plataformaConsola"] , PDO::PARAM_INT);
        $stmt->bindParam(":numero", $datosConsola["numeroConsola"], PDO::PARAM_INT);
        $stmt->bindParam(":serial", $datosConsola["serialConsola"], PDO::PARAM_STR);
        $stmt->bindParam(":costo_renta", $datosConsola["costoRenta"], PDO::PARAM_INT);
        $stmt->bindParam(":total_monedas", $datosConsola["totalMonedas"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datosConsola["id"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    public function eliminarDatosConsola($id, $tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");
        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }
    }



















    /*** ADMINISTRACIÓN DE JUEGOS  ***/

    public function guardarDatosJuego($datosJuego, $tabla){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(titulo) VALUES(:titulo) ");
        $stmt->bindParam(":titulo", $datosJuego["nombreJuego"], PDO::PARAM_STR);
        $stmt->execute();
        print_r($datosJuego);

        $stmt = Conexion::conectar()->prepare("SELECT * FROM juegos ORDER BY id DESC");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        $ultimo_id = $r[0][0];

        $stmt = Conexion::conectar()->prepare("INSERT INTO juegos_plataformas(id_juego, id_plataforma) VALUES(:id_juego, :id_plataforma) ");
        $stmt->bindParam(":id_juego", $ultimo_id , PDO::PARAM_INT);
        $stmt->bindParam(":id_plataforma",  $datosJuego["plataforma"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    public function traerDatosJuegos() {
        $stmt = Conexion::conectar()->prepare(" 
        SELECT * FROM juegos INNER JOIN juegos_plataformas ON juegos.id = juegos_plataformas.id_juego INNER JOIN plataformas ON plataformas.id = juegos_plataformas.id_plataforma;
        ");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function traerDatosJuego($id){
        $stmt = Conexion::conectar()->prepare(" 
            SELECT consolas.id as id, consolas.id_plataforma as id_plataforma, consolas.numero as numero, consolas.serial_consola as serial_consola, consolas.costo_renta as costo_renta, consolas.total_monedas as total_monedas, plataformas.nombre as nombre_plataforma FROM consolas INNER JOIN plataformas ON consolas.id_plataforma = plataformas.id WHERE consolas.id = :id;
        ");

        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }

    public function editarDatosJuego($datosConsola, $tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                                               SET id_plataforma = :id_plataforma, numero = :numero, serial_consola = :serial, costo_renta = :costo_renta, total_monedas = :total_monedas
                                               WHERE id = :id ");

        $stmt->bindParam(":id_plataforma", $datosConsola["plataformaConsola"] , PDO::PARAM_INT);
        $stmt->bindParam(":numero", $datosConsola["numeroConsola"], PDO::PARAM_INT);
        $stmt->bindParam(":serial", $datosConsola["serialConsola"], PDO::PARAM_STR);
        $stmt->bindParam(":costo_renta", $datosConsola["costoRenta"], PDO::PARAM_INT);
        $stmt->bindParam(":total_monedas", $datosConsola["totalMonedas"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datosConsola["id"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

    }

    public function eliminarDatosJuego($id, $tabla){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id ");
        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        if($stmt->execute() ){
            return "success";
        }else{
            return "error";
        }
    }



    /** ADMINISTRACION DE TORNEOS DEL SOCIO GAMER **/
    public function traerDatosTorneos() {
        $stmt = Conexion::conectar()->prepare(" 
        SELECT *, torneos.titulo as tituloTorneo FROM torneos INNER JOIN juegos ON juegos.id = torneos.id_juego
        ");
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;
    }


    public function registrarGamerEnTorneo($datos) {
        $stmt = Conexion::conectar()->prepare("INSERT INTO socio_torneo(id_torneo, id_socio) VALUES(:id_torneo, :id_socio) ");
        $stmt->bindParam(":id_torneo", $datos["torneo"] , PDO::PARAM_INT);
        $stmt->bindParam(":id_socio",  $datos["gamer"], PDO::PARAM_INT);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
    }

    public function traerDatosTorneosDelGamer() {

        $stmt = Conexion::conectar()->prepare(" 
            SELECT *, torneos.titulo as tituloTorneo 
            FROM torneos 
            INNER JOIN juegos ON juegos.id = torneos.id_juego
            INNER JOIN socio_torneo ON torneos.id = socio_torneo.id_torneo
            INNER JOIN socios ON socio_torneo.id_socio = socios.id
            WHERE socios.id = :id
        ");

        $stmt->bindParam(":id", $_SESSION['idUsuario'] , PDO::PARAM_INT);
        $stmt->execute();
        $r = array();
        $r = $stmt->FetchAll();
        return $r;


    }

} 

?>