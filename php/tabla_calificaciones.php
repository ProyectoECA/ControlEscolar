<?php

require_once("../CRUD/CRUD_bd_SQLServer.php");
$conexion = new CRUD_SQL_SERVER();
$conexion->conexionBD();

$alumnos = [];

if(isset($_POST["claveCa"]) && isset($_POST['claveMa'])){
    $clave_carrera = $_POST["claveCa"];
    $clave_materia = $_POST['claveMa'];
    $query = "SELECT CONCAT(Nombre,ApePaterno,ApeMaterno) as NombreCompleto,CapturaCal.NoControl,CalFinal, Repeticion,
                Uni1, Uni2, Uni3, Uni4, Uni5, Uni6, Uni7, Uni8, Uni9, Uni10
            from CapturaCal, Alumnos
            where Alumnos.NoControl = CapturaCal.NoControl
            and CapturaCal.ClaveCa = ?
            and CapturaCal.ClaveMat = ?";
    $parametros = array($clave_carrera,$clave_materia);
    $alumnos = $conexion->Buscar($query,$parametros);


}
$conexion->CerrarConexion();

$data = ["alumnosT"=>$alumnos];
header("Content-Type: application/json");
echo json_encode($data);

?>