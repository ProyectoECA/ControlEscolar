<?php
define("ServerName", 'DESKTOP-J1AR91P');
define("Database", "ConEscolarNoc");
define("UID", "Admini");
define("PWD", "control2022");
define("CharacterSet", 'UTF-8');

class Insertar_Secretaria{
    function insertando(){
        echo "hola";
        $no_empleado=$_POST["numeroEmple"];
        echo $no_empleado;
        $nombre=$_POST["nombre"];
        $ape_Pat=$_POST["apellidoP"];
        $ape_Mat=$_POST["appelidoM"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $estado=$_POST["estado"];
        $codPos=$_POST["cp"];
        $telefono=$_POST["tel"];
        $email=$_POST["correo"];
        
        /*$no_empleado=005;
        $nombre="yo";
        $ape_Pat="fvbn";
        $ape_Mat="dfgbnm";
        $calle="vbnm";
        $colonia="cvbnm";
        $municipio="dvbhjnkm";
        $estado="vbnm";
        $codPos="95625";
        $telefono="26262622";
        $email="fghyjmnbg";*/

        #INSERTA EN TABLA SECRETARIAS
        $connectionInfo = array("Database"=>Database , "UID"=>UID, "PWD"=>PWD, "CharacterSet"=>CharacterSet);
        $conexion=sqlsrv_connect(ServerName, $connectionInfo);
        $query="INSERT INTO [Secretarias] (IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia) VALUES (?,?,?,?,?,?,?,?)";
        $parametros=array($no_empleado,$nombre,$ape_Pat,$ape_Mat,$telefono,$email,$calle,$colonia);
        $stmt = sqlsrv_query($conexion, $query, $parametros);
        
        include_once '../PaginasVista/secretarias.php';
    }
}
$in= new Insertar_Secretaria;
$in->insertando();
?>