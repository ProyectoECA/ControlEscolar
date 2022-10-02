<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Cambio_Password  {

    function cambiaP_Jefe(){
            $pass = $_POST["pass"];
            echo $pass;
            $pass1 = $_POST["pass1"];
            echo $pass1;

        $archivo= fopen("Archivo.txt","r") or die("Problema al abrir el archivo");
        while(!feof($archivo)){
            $user=fgets($archivo);
        }
        fclose($archivo);
        
        
        
        
        if($pass==$pass1){
            echo "dentro de if";
            echo $pass;
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
            
            $query="UPDATE LogAdmin SET PassAdm=? where UsuaAdm=?";
            $parametros=array($password_hash,$user);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
    
            sqlsrv_close($conexion);
            echo "CONTRASEÑA CAMBIADA";

        }
        else{
            echo "LAS CONTRASEÑAS NO SON IGUALES";
        }
        
        
        

        
        /*
        $pass=123;
        $password_hash = password_hash($pass, PASSWORD_DEFAULT);

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
            
            $query="UPDATE LogAdmin SET PassAdm=? where UsuaAdm=?";
            $parametros=array($password_hash,$user);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
    
            sqlsrv_close($conexion);
            echo "CONTRASEÑA CAMBIADA";*/

       

        //include_once "PaginasVista/jefe_Control.html";
    }
}
$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>