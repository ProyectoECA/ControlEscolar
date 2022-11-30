<?php
session_start();

require_once("../CRUD/CRUD_bd_SQLServer.php");
$conexion = new CRUD_SQL_SERVER();
$conexion->conexionBD();

$nombre = "";
$materias = [];

if(isset($_SESSION['user'])){

    $nombre = $_SESSION['user'][2];
    $user = $_SESSION['user'][0];


    $sql = "SELECT AsigMaes.ClaveMat, Materias.Nombre, Carreras.NombreCarre, Carreras.ClaveCa FROM Materias,AsigMaes,Carreras
            WHERE AsigMaes.Maestro = ? AND AsigMaes.ClaveMat = Materias.ClaveMat
            AND AsigMaes.ClaveCa = Carreras.ClaveCa";
    $parametros = array($user);
    $materias = $conexion->Buscar($sql,$parametros);


}
$conexion->CerrarConexion();

$data = ["nombre"=>$nombre,"materias"=>$materias];
header("Content-Type: application/json");
echo json_encode($data);

?>