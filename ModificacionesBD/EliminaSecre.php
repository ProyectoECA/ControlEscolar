<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Elimina_Sec{

    function eliminando(){
        #RECEPCION DE DATOS
        $no_empleado=$_POST["clave2"];
        echo $no_empleado;
        $nom=$_POST["nombre"];
        $apeP=$_POST["apellidoP"];
        $apeM=$_POST["apellidoM"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $estado=$_POST["estado"];
        $codPos=$_POST["cp"];
        $tel=$_POST["tel"];
        $correo=$_POST["correo"];
        
        $in=new Elimina_Sec;
    }
}
?>
