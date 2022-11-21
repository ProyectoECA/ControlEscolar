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
    <div class="nombre" style="float: center;"> 
        <div class="titulo">
            <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
        </div> 
        <h2>MODIFICAR DATOS DE SECRETARIAS(OS)</h2>
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
                <input id="numeroe" class="conteDatos" type="text" placeholder="NO. EMPLEADO" name="clave2" value="<?php echo $row['IdSec'];?>" readonly>
                <input id="nombre" class="conteDatos" type="text" placeholder="NOMBRE" name="nombre" value="<?php echo $row['Nombre'];?>" required minlength="3">
                <input id="ap" class="conteDatos" type="text" placeholder="AP. PATERNO" name="apellidoP" value="<?php echo $row['ApePaterno'];?>" required minlength="3" >
                <input id="am" class="conteDatos" type="text" placeholder="AP. MATERNO" name="apellidoM" value="<?php echo $row['ApeMaterno'];?>">
                <input id="calle" class="conteDatos2" type="text" placeholder="CALLE Y NÚMERO" name="calle" value="<?php echo $row['Calle'];?>" required minlength="5" >
                <input id="colonia" class="conteDatos2" type="text" placeholder="COLONIA" name="colonia" value="<?php echo $row['Colonia'];?>" required minlength="4" >
                <input id="municipio" class="conteDatos2" type="text" placeholder="MUNICIPIO" name="municipio" value="<?php echo $row['Municipio'];?>" required minlength="4" > 
                <input id="estado" class="conteDatos2" type="text" placeholder="ESTADO" name="estado" value="<?php echo $row['Estado'];?>" required minlength="4" >
                <input id="cp" class="conteDatos3" type="text" placeholder="CÓDIGO POSTAL" name="cp" value="<?php echo $row['CP'];?>" required pattern="[\d]{5}$">
                <input id="tel" class="conteDatos3" type="text" placeholder="TELÉFONO" name="tel" value="<?php echo $row['Telefono'];?>" required pattern="[\d]{10}$">
                <input id="correo" class="conteDatos3" type="email" placeholder="CORREO" name="correo" value="<?php echo $row['Correo'];?>" >
                </div>
                <div class="contenedor-botones" style="float: center;">
                <!-- <input  id="btn" class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href='/ModificacionesBD/ModificaSecre.php'">
                <input  id="btn2" class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href='/ModificacionesBD/ModificaSecre.php'"> -->
                <input  id="btn" class="botones" type="submit" name="modifica" value="EDITAR" onclick="validar()">
                <input  id="btn2" class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="eliminar()">
                </div>
                </form>
            </div>
            <script src="modisecretarias.js"></script>
            </body>
            </html>