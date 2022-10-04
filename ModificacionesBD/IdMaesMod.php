<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modificar</title>
                <link rel="stylesheet" href="/css/estilos_modificar_maestros.css">
            </head>
            <body>
                <div class="logo" style="float: left;">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
                </div> 
                <div class="nombre" style="float: center;">
                    <h1><b>TECNOLÓGICO DE NOCHISTLÁN</b></h1>
                </div> 
                <form method="POST">
                <div class="datos" style="float: center;">
                    <input class="input" type="text" placeholder="Clave" name="clave1">
                    <input class="btnBuscar" type="submit" value="BUSCAR" >&nbsp;&nbsp;
                </div> 
                </form>
                <div class="contenedor-general" style="float: center;">

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
        $datos= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);?> 

        <?php
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
        }
        else{
                $query="SELECT Maestros.ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
                FROM [Maestros],[LugMaestros],[Lugar] where (Maestros.ClaveMa=? and Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP)";
                $parametros=array($clave);
                $stmt = sqlsrv_query($conexion, $query,$parametros);
                while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?> 
                <form  method="POST" action="../ModificacionesBD/ModificaMaes.php" >
                    <div class="contenedor-datos" style="float: center;">
                        <input class="conteDatos" type="text" placeholder="Clave"  value="<?php echo $row['ClaveMa'];?>" name="clave2" readonly>
                        <input class="conteDatos" type="text" placeholder="Nombre" name="nombre" value="<?php echo $row['Nombre']; ?>"> 
                        <input class="conteDatos" type="text" placeholder="Ap. paterno" name="apePat" value="<?php echo $row['ApePaterno']; ?>"> 
                        <input class="conteDatos" type="text" placeholder="Ap. materno" name="apeMat" value="<?php echo $row['ApeMaterno']; ?>"> 
                        <input class="conteDatos2" type="text" placeholder="Calle y número" name="calle" value="<?php echo $row['Calle']; ?>"> 
                        <input class="conteDatos2" type="text" placeholder="Colonia" name="colonia" value="<?php echo $row['Colonia']; ?>"> 
                        <input class="conteDatos2" type="text" placeholder="Municipio" name="municipio" value="<?php echo $row['Municipio']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Estado" name="estado" value="<?php echo $row['Estado']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Código postal" name="cp" value="<?php echo $row['CP']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Teléfono" name="telefono" value="<?php echo $row['Telefono']; ?>">  
                        <input class="conteDatos4" type="text" placeholder="RFC" name="rfc" value="<?php echo $row['RFC']; ?>"> 
                        <input class="conteDatos4" type="text" placeholder="Titulo" name="titulo" value="<?php echo $row['Titulo']; ?>">
                        <input class="conteDatos4" type="text" placeholder="Correo" name="correo" value="<?php echo $row['Correo']; ?>">
                    </div> 
                    <div class="contenedor-botones" style="float: center;">
                    <input class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    <input class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    </div>
                </form>   
                </div>
            </body>
            </html>
                <?php
                }
    
        }
    }
}
$id=new saca_IDMaes;
$id->agrega_idMaes();
?>