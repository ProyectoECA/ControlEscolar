<?php
//CONEXION PARA LA BASE DE DATOS

class Conexion{
    function conexionBD(){
        $serverName='controlescolarservidor.database.windows.net';
        //$serverName='DESKTOP-J1AR91P';
        $connectionInfo = array("Database"=>"ConEscolarBD", "UID"=>"nochistlanadm", "PWD"=>"Sok03951", "CharacterSet"=>"UTF-8");
        $con=sqlsrv_connect($serverName, $connectionInfo);
        
        if($con)
        {
            echo "CONEXION EXITOSA";
        }
        else{
            echo "FALLO EN LA CONEXION";
            die(print_r(sqlsrv_errors(), true));
        }

    } 
}
$c= new Conexion();
$c->conexionBD();
?>