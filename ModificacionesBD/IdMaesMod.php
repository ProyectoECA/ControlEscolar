<?php
include_once '../CRUD/Usuarios_password.php';

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class saca_IDMaes{
    function agrega_idMaes(){
        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();
        
        $clave = $_POST["clave1"];
        $file=fopen("ModMaes.txt","w");
        fwrite($file,$clave);
        fclose($file);
    }
}
$id=new saca_IDMaes;
$id->agrega_idMaes();
?>