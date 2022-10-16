<?php

define("ServerName3", 'localhost');
define("Database3", "ConEscolarNoc");
define("UID3", "Admini");
define("PWD3", "control2022");
define("CharacterSet3", 'UTF-8');

class saca_IDMaes{
    function agrega_idMaes(){
        $connectionInfo = array("Database"=>Database3 , "UID"=>UID3, "PWD"=>PWD3, "CharacterSet"=>CharacterSet3);
        $conexion=sqlsrv_connect(ServerName3, $connectionInfo);
     
        $clave = $_POST["clave1"];
        $query="SELECT Maestros.ClaveMa
        FROM [Maestros],[LugMaestros],[Lugar] where (Maestros.ClaveMa=? and Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP)";
        $parametros=array($clave);
        $stmt = sqlsrv_query($conexion, $query,$parametros);
        $datos= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if(empty($datos)){?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Datos inexistentes',
                    confirmButtonText: 'Aceptar',
                    timer:5000,
                    timerProgressBar:true,
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='../ModificacionesBD/IdMaesMod.php';
                    }
                    else{
                        location.href='../PaginasVista/modificar_maestros.html';
                    }
                    window.history.back('../PaginasVista/jefe_Control.html');})
                </script>
        <?php
        include_once("../PaginasVista/modificar_maestros.html");
        }
        else{
                $query="SELECT Maestros.ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
                FROM [Maestros],[LugMaestros],[Lugar] where (Maestros.ClaveMa=? and Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP)";
                $parametros=array($clave);
                $stmt2 = sqlsrv_query($conexion, $query,$parametros);
                $row=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
                include_once("ConsultaModiMaes.php");
            }
                }
    
        }

$id=new saca_IDMaes;
$id->agrega_idMaes();
?>