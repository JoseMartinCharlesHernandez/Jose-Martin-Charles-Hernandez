<?php
class Conexion{

    public function conectar(){
        $pdo = new PDO("mysql:host=localhost;dbname=sistema_web", "root", "");
        return $pdo;
    }

}