<?php
include_once "../CRUD/Usuarios_password.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Insertar_Secretaria{
    function insertando(){

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        $no_empleado=$_POST["numeroEmple"];
        $nombre=$_POST["nombre"];
        $ape_Pat=$_POST["apellidoP"];
        $ape_Mat=$_POST["apellidoM"];
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
        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName, $connectionInfo);
        $query="INSERT INTO [Secretarias] (IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia) VALUES (?,?,?,?,?,?,?,?)";
        $parametros=array($no_empleado,$nombre,$ape_Pat,$ape_Mat,$telefono,$email,$calle,$colonia);
        $stmt = sqlsrv_query($conexion, $query, $parametros);

        $query="SELECT * FROM [Lugar] where cp=?";
        $parametros=array($codPos);
        $stmt = sqlsrv_query($conexion, $query, $parametros);
        $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
    
        if(empty($datos)){
            $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
            $parametros=array($codPos, $municipio, $estado);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="INSERT INTO [LugSecretarias] (IdSec,CP) VALUES (?,?)";
            $parametros=array($no_empleado,$codPos);
            $stmt=sqlsrv_query($conexion,$query,$parametros);
            $resul=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

            $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
            $conexion_pass->CerrarConexion();
        }
        else{
            $query="INSERT INTO [LugSecretarias] (IdSec,CP) VALUES (?,?)";
            $parametros=array($no_empleado,$codPos);
            $stmt=sqlsrv_query($conexion,$query,$parametros);

            $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
            $conexion_pass->CerrarConexion();
        }
        sqlsrv_close($conexion);
        include '../PaginasVista/secretarias.html';
    }
}
$in= new Insertar_Secretaria;
$in->insertando();
?>