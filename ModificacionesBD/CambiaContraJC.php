<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Cambio_Password{
    function cambiaP_Jefe(){
        $pass="123456";
        $user="RH000";

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        echo $password_hash;

        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
        $query="UPDATE LogAdmin SET PassAdm=$password_hash where UsuaAdm=$user";
        $stmt = sqlsrv_query($conexion, $query);
    }
}
$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>