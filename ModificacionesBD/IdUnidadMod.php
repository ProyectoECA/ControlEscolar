<?php
define("ServerName3", 'localhost');
define("Database3", "ConEscolarNoc");
define("UID3", "Admini");
define("PWD3", "control2022");
define("CharacterSet3", 'UTF-8');

class saca_IDUni{
    function busca_idUni(){
        $connectionInfo = array("Database"=>Database3 , "UID"=>UID3, "PWD"=>PWD3, "CharacterSet"=>CharacterSet3);
        $conexion=sqlsrv_connect(ServerName3, $connectionInfo);
     
        $clave = $_POST["clave1"];
        $query="SELECT ClaveMat FROM [CaptuUnidades] where ClaveMat='".$clave."'";
        $stmt = sqlsrv_query($conexion, $query);
        $datos= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if(!empty($datos)){
            $query="SELECT ClaveMat FROM [CaptuUnidades] where ClaveMat='".$clave."'";
            $stmt2 = sqlsrv_query($conexion, $query);
            $row= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            include_once("ConsultaModiUnidad.php");
    }
    }
}

$id=new saca_IDUni;
$id->busca_idUni();
?>