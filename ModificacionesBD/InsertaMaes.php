<?php
//nclude_once '../CRUD/CRUD_bd_SQLServer.php';

class Insertar_Maestros {

    function insertando(){

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
        

        $serverName='localhost';
        //$serverName='DESKTOP-J1AR91P';
        $connectionInfo = array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $conexion=sqlsrv_connect($serverName, $connectionInfo);
        $query= "INSERT INTO [Maestros], (ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC, Titulo,Telefono,Correo,Calle,Colonia) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$rfc,$titulo,$telefono,$correo,$calle,$colonia);
        $stmt= sqlsrv_query($conexion,$query, $parametros);
    
       
    }
}

    $in= new Insertar_Maestros;
    $in->insertando();

        



        

    


    


?>