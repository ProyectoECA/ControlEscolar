<?php
define("ServerName3", 'controlescolarservidor.database.windows.net');
define("Database3", "ConEscolarBD");
define("UID3", "nochistlanadm");
define("PWD3", "Sok03951");
define("CharacterSet3", 'UTF-8');

class saca_IDUni{
    function busca_idUni(){
        $connectionInfo = array("Database"=>Database3 , "UID"=>UID3, "PWD"=>PWD3, "CharacterSet"=>CharacterSet3);
        $conexion=sqlsrv_connect(ServerName3, $connectionInfo);
        
        $clave = $_POST["clave1"];
        $uni = $_POST["unidad1"];
        $query="SELECT ClaveMat FROM [CaptuUnidades] WHERE ClaveMat=? and NoUni=?";
        $parametros=array($clave,$uni);
        $stmt = sqlsrv_query($conexion, $query,$parametros);
        $datos= sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

        if(!empty($datos)){
            $query="SELECT * FROM [CaptuUnidades] WHERE ClaveMat=? and NoUni=?";
            $parametros=array($clave,$uni);
            $stmt2 = sqlsrv_query($conexion, $query, $parametros);
            $row=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC);
            include_once("ConsultaModiUnidad.php");
        }
        else{
            include_once("../PaginasVista/modificaUnidad.html");
        }
    }
}

$id=new saca_IDUni;
$id->busca_idUni();
?>