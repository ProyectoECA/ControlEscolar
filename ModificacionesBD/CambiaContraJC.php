<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Cambio_Password{
    function cambiaP_Jefe(){
        $user="RH000";
        //$user = $_POST["username"];
        echo "USUARIO";
        echo $user;

        $pass = $_POST["pass"];
        echo "PASSWORD";
        
        //$pass="1234";
        echo $pass;
        //$user="RH000";

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);

        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
        
        $query="UPDATE LogAdmin SET PassAdm=? where UsuaAdm=?";
        $parametros=array($password_hash,$user);
        $stmt= sqlsrv_query($conexion,$query, $parametros);

        sqlsrv_close($conexion);
        include '../PaginasVista\jefe_Control.html';
    }
}
$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>