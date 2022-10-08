<?php
include_once ("CRUD_bd_SQLServer.php");

$in=new CRUD_SQL_SERVER();
$in->conexionBD();

$parametros=array("99720");
$query="SELECT * FROM [Lugar] where CP=?";

$res=$in->Buscar($query,$parametros);
$in->CerrarConexion();
var_dump($res);

echo $res[0][0];
if ($res[0][0]="CP"){
    echo "Ya se encuentra en la base de datos";
}
else{
    echo "Se puede registrar";
}



?>
