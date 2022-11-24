<?php
define("ServerName3", 'controlescolarservidor.database.windows.net');
define("Database3", "ConEscolarBD");
define("UID3", "nochistlanadm");
define("PWD3", "Sok03951");
define("CharacterSet3", 'UTF-8');

class saca_IDMate{
    function busca_idMate(){
        $connectionInfo = array("Database"=>Database3 , "UID"=>UID3, "PWD"=>PWD3, "CharacterSet"=>CharacterSet3);
        $conexion=sqlsrv_connect(ServerName3, $connectionInfo);
        
        $clave = $_POST["clave1"];
        $query="SELECT ClaveMat FROM [Materias] WHERE ClaveMat=?";
        $parametros=array($clave);
        $stmt = sqlsrv_query($conexion, $query,$parametros);
        $datos= sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

        if(!empty($datos)){
            $query="SELECT * FROM [Materias] WHERE ClaveMat=?";
            $parametros=array($clave);
            $stmt2 = sqlsrv_query($conexion, $query, $parametros);
            $row=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC);
            include_once("ConsultaModiMate.php");
        }
        else{
            include_once("../PaginasVista/modificar_materias.html");
        }
    }
}

$id=new saca_IDMate;
$id->busca_idMate();
?>