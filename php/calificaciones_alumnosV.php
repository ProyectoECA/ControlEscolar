<?php
require_once("../CRUD/CRUD_bd_SQLServer.php");
$conexion = new CRUD_SQL_SERVER();
$conexion->conexionBD();
$data = [];
if(isset($_POST["claveAlu"]) && isset($_POST["semestre"])){

    $clave = $_POST["claveAlu"];
    $semestre = $_POST["semestre"];

    $sql = "SELECT Unidades,Nombre,Uni1,Uni2,Uni3,Uni4,Uni5,Uni6,Uni7,Uni8,Uni9,Uni10,CalFinal
    from CapturaCal, Materias
    where CapturaCal.NoControl = ?
    and Materias.ClaveMat = CapturaCal.ClaveMat
    and Materias.semestre = ?
    or CapturaCal.Repeticion = 'R'
    and CapturaCal.NoControl = ?
    and Materias.ClaveMat = CapturaCal.ClaveMat";

    $parametros = array($clave,$semestre,$clave);
    $data = $conexion->Buscar($sql,$parametros);
    

}
$conexion->CerrarConexion();
header("Content-Type: application/json");
echo json_encode($data);


?>