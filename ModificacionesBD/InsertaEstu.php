<?php

include_once '../CRUD/Usuarios_password.php';
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Insertar_Estu{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        
        
    }
}

?>