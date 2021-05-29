<?php
require_once("bbdd.php");

class Database {

    public static function conectar()
    {
        $conexion = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME, USER, PASS);
        //Asignación de atributos para detección de errores.
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Codificación para evitar símbolos en carácteres especiales.
        $conexion->exec("SET CHARACTER SET utf8");
        //devuelve objeto Conexion
        return $conexion;
    }
}

