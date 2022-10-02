<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Modifica_Sec{

    function modificando(){
        
        $noEmpl=$_POST["numeroEmpl"];
        $nom=$_POST["nombre"];
        $apeP=$_POST["apellidoP"];
        $apeM=$_POST["apellidoM"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $muni=$_POST["municipio"];
        $estado=$_POST["estado"];
        $cp=$_POST["cp"];
        $tel=$_POST["tel"];
        $correo=$_POST["correo"];
        

    }
}

$mod=new Modifica_Sec;
$mod->modificando();
?>