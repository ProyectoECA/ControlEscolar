<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="/css/estilos_modificar_secretarias.css">
</head>
<body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="logo" style="float: left;">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
    </div> 
    <div class="titulo">
            <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
        </div> 
        <h2>MODIFICAR DATOS DE MAESTROS(AS)</h2>
    </div> 
    <form method="POST">
    <div class="datos" style="float: center;">
        <input class="input" type="text" placeholder="No. Empleado" name="noEmpl">&nbsp;&nbsp;
        <input class="btnBuscar" type="submit" value="BUSCAR"> &nbsp;&nbsp;
        <input class="btnSalir" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php'">&nbsp;&nbsp;
    </div>  
    </form>
    <div class="contenedor-general" style="float: center;">
    <form method="POST" action="/ModificacionesBD/ModificaSecre.php">
                <div class="contenedor-datos" style="float: center;">
                <input class="conteDatos" type="text" placeholder="No. Empleado" name="clave2" value="<?php echo $row['IdSec'];?>" readonly>
                <input class="conteDatos" type="text" placeholder="Nombre" name="nombre" value="<?php echo $row['Nombre'];?>">
                <input class="conteDatos" type="text" placeholder="Ap. paterno" name="apellidoP" value="<?php echo $row['ApePaterno'];?>">
                <input class="conteDatos" type="text" placeholder="Ap. materno" name="apellidoM" value="<?php echo $row['ApeMaterno'];?>">
                <input class="conteDatos2" type="text" placeholder="Calle y número" name="calle" value="<?php echo $row['Calle'];?>">
                <input class="conteDatos2" type="text" placeholder="Colonia" name="colonia" value="<?php echo $row['Colonia'];?>">
                <input class="conteDatos2" type="text" placeholder="Municipio" name="municipio" value="<?php echo $row['Municipio'];?>"> 
                <input class="conteDatos2" type="text" placeholder="Estado" name="estado" value="<?php echo $row['Estado'];?>">
                <input class="conteDatos3" type="text" placeholder="Código postal" name="cp" value="<?php echo $row['CP'];?>">
                <input class="conteDatos3" type="text" placeholder="Teléfono" name="tel" value="<?php echo $row['Telefono'];?>">
                <input class="conteDatos3" type="text" placeholder="Correo" name="correo" value="<?php echo $row['Correo'];?>">
                </div>
                <div class="contenedor-botones" style="float: center;">
                <input class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href='/ModificacionesBD/ModificaSecre.php'">
                <input class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href='/ModificacionesBD/ModificaSecre.php'">
                </div>
                </form>
            </div>
            </body>
            </html>