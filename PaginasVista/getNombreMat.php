<?php
$id_mat=$_POST['Id'];
echo $id_mat;
include_once "../CRUD/CRUD_bd_SQLServer.php";
$conexion=new CRUD_SQL_SERVER();
$conexion->conexionBD();

$id_mat=$_POST['Id'];
echo $id_mat;

if($conexion){
    $query="SELECT Nombre FROM Materias WHERE ClaveMat='$id_mat'";
    $resultados=mysqli_query($conexion, $query);
    while($row = mysqli_fetch_array($resultados)){
        $nombre=$row['Nombre'];
        echo $nombre;
        $html = "<input value='" . $nombre . "'>" . $nombre;
        echo $html;
    }
}
?>