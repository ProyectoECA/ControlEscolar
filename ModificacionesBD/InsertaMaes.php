<?php

include_once '../CRUD/Usuarios_password.php';

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Insertar_Maestros {

    function insertando(){

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        $clave = $_POST["clave"]; 
        $nombre = $_POST["nombre"]; 
        $apePaterno = $_POST["apePat"]; 
        $apeMaterno = $_POST["apeMat"]; 
        $calle = $_POST["calle"]; 
        $colonia = $_POST["colonia"]; 
        $municipio = $_POST["municipio"]; 
        $estado = $_POST["estado"]; 
        $cp = $_POST["cp"]; 
        $telefono = $_POST["telefono"]; 
        $rfc = $_POST["rfc"]; 
        $titulo = $_POST["titulo"]; 
        $correo = $_POST["correo"]; 
        
        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

        $query= "INSERT INTO [Maestros] (ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$rfc,$titulo,$telefono,$correo,$calle,$colonia);
        $stmt= sqlsrv_query($conexion,$query, $parametros);

        $query="SELECT * FROM [Lugar] where cp=?";
        $parametros=array($cp);
        $stmt= sqlsrv_query($conexion,$query, $parametros);
        $arreResul= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if(empty($arreResul)){
            $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
            $parametros=array($cp, $municipio, $estado);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query= "INSERT INTO [LugMaestros] (ClaveMa,CP) VALUES (?,?)";
            $parametros=array($clave,$cp);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
            $conexion_pass->CerrarConexion();




        }
        else{
            $query= "INSERT INTO [LugMaestros] (ClaveMa,CP) VALUES (?,?)";
            $parametros=array($clave,$cp);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
            $conexion_pass->CerrarConexion();
            
        }
    
        sqlsrv_close($conexion);
        include_once '../PaginasVista\maestros_datos_per.php';
    }
}
    $in= new Insertar_Maestros;
    $in->insertando();

    

?>