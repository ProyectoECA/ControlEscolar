<?php

include_once("CRUD_bd_general.php");
$base = new CRUD_general();
$base->conexionBD();
//$sql = "INSERT INTO DATOS_USUARIOS (NOMBRE, APELLIDO, DIRECCION) VALUES(:nom, :ape, :dir)";
//$base->INSERTAR_ELIMINAR_ACTUALIZAR($sql, [":nom"=>"mariana", ":ape"=>"hernandez", ":dir"=>"sierra choco"]);
//$base->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE FROM datos_usuarios WHERE id=:id", [":id"=>"6"]);
//$base->INSERTAR_ELIMINAR_ACTUALIZAR("UPDATE datos_usuarios SET Direccion=:midir WHERE id=:mid", [":mid"=>"4", ":midir"=>"sierra madre"]);
//$base->INSERTAR_ELIMINAR_ACTUALIZAR("DELETE FROM datos_usuarios WHERE id=:id", [":id"=>"4"]);
//$base->MOSTRAR("SELECT * FROM datos_usuarios where id=:id", [":id"=>"1"]);
$base->conexion=null;


?>