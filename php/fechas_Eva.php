<?php

require_once("../CRUD/CRUD_bd_SQLServer.php");
$conexion = new CRUD_SQL_SERVER();
$conexion->conexionBD();

$fechas = [];

if(isset($_POST["claveCa"]) && isset($_POST['claveMa'])){
    $clave_carrera = $_POST["claveCa"];
    $clave_materia = $_POST['claveMa'];
    
    $sql = "SELECT ClaveMat, NoUni, ClaveCa
    from CaptuUnidades
    where ClaveMat=? and ClaveCa=? ";
    $parametros = array($clave_materia,$clave_carrera);
    $fechas = $conexion->Buscar($sql,$parametros);

}
$conexion->CerrarConexion();

$data = ["fechas"=>$fechas];
header("Content-Type: application/json");
echo json_encode($data);

?>