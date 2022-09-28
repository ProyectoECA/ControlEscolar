<?php
include_once '../CRUD/CRUD_bd_SQLServer.php';

class Insertar_Secretaria extends CRUD_SQL_SERVER{
    function insertando(){
        $crud = new CRUD_SQL_SERVER();
        $crud->conexionBD();
    }
}
?>