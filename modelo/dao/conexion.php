<?php

class Conexion {
    private static $host = "127.0.0.1";
    private static $user = "root";
    private static $pwd = "";
    private static $bd = "attendance management";

    public static function conectar() {
        return mysqli_connect(Conexion::$host, Conexion::$user, Conexion::$pwd, Conexion::$bd);
    }
}
?>
