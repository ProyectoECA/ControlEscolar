<?php
//CONEXION PARA LA BASE DE DATOS

class Conexion{
    function conexionBD(){
        //$serverName='localhost';
        $serverName='DESKTOP-J1AR91P';
        $connectionInfo = array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con=sqlsrv_connect($serverName, $connectionInfo);
        
        if($connectionInfo)
        {
            //echo "CONEXION EXITOSA";
        }
        else{
            //echo "FALLO EN LA CONEXION";
            //die(print_r(sqlsrv_errors(), true));
        }

    } 
}
$c= new Conexion();
$c->conexionBD();
?>