<?php
session_start();

require_once("../CRUD/CRUD_bd_SQLServer.php");
$conexion = new CRUD_SQL_SERVER();
$conexion->conexionBD();
$nombre = "";
$arreglo = [];
if(isset($_SESSION['user'])){

    $nombre = $_SESSION['user'][2];
    $user = $_SESSION['user'][0];

    $sql = "SELECT Alumnos.NoControl, Alumnos.Nombre, Alumnos.ApePaterno, Alumnos.ApeMaterno,
    Alumnos.Calle, Lugar.Municipio, Lugar.Estado, Lugar.CP, Alumnos.Telefono, Alumnos.Correo,
    Carreras.NombreCarre, CarreAlumnos.Semestre, Alumnos.NomTutor, Alumnos.TelTutor
    from Alumnos, LugAlumnos, Lugar, CarreAlumnos, Carreras
    where Alumnos.NoControl = ?
    and LugAlumnos.NoControl = Alumnos.NoControl
    and CarreAlumnos.NoControl = Alumnos.NoControl
    and Lugar.CP = LugAlumnos.CP
    and Carreras.ClaveCa = CarreAlumnos.ClaveCa";
    $parametros = array($user);
    $arreglo = $conexion->Buscar($sql,$parametros);


}
$conexion->CerrarConexion();
$data = ["nombre"=>$nombre, "arreglo"=>$arreglo];
header("Content-Type: application/json");
echo json_encode($data);

?>