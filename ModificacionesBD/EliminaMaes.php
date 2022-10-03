<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Elimina_Maes{

    function eliminando(){
        #RECEPCION DE DATOS
        $clave = $_POST["clave2"]; 
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
        
        $in=new Elimina_Maes;
    }
}
?>
