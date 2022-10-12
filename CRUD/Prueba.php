<?php
include_once ("CRUD_bd_SQLServer.php");

$in=new CRUD_SQL_SERVER();
$in->conexionBD();

$parametros=array("99720");
$query="SELECT * FROM [Lugar]";

$res=$in->Buscar($query);
$in->CerrarConexion();

for ($i=0; $i < count($res) ; $i++) { 
    echo "Registro $i";
    echo $res[$i]["CP"] ." ";
    echo $res[$i]["Municipio"] ." ";
    echo $res[$i]["Estado"] ." ";
    echo "<br>";
}

?>
