<?php
include_once '../CRUD/CRUD_bd_SQLServer.php';

class Insertar_Secretaria extends CRUD_SQL_SERVER{
    function insertando(){
        $this->conexionBD();

        $no_empleado=$_POST["numeroEmple"];
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

        $query="INSERT INTO [Secretarias],(IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia) 
        VALUES(?,?,?,?,?,?,?,?)";
        $parametros=array($no_empleado,$nombre,$ape_Pat,$ape_Mat,$telefono,$email,$calle,$colonia);

        #INSERTA EN TABLA SECRETARIAS
        $this->Insertar_Eliminar_Actualizar($query,$parametros);
    }
}
?>