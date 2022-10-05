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
                    <input class="btnBuscar" type="submit" value="BUSCAR" onclick="location.href = '/ModificacionesBD/IdMaesMod.php' ">&nbsp;&nbsp;
                    <input class="btnSalir" type="submit" value="SALIR" onclick="location.href = '/ModificacionesBD/IdMaesMod.php' ">&nbsp;&nbsp;
                </div>
                </form>
                <div class="contenedor-general" style="float: center;">
                <form  method="POST" action="../ModificacionesBD/ModificaMaes.php" >
                    <div class="contenedor-datos" style="float: center;">
                        <input class="conteDatos" type="text" placeholder="Clave"  value="<?php echo $row['ClaveMa']; ?>"  name="clave2" readonly>
                        <input class="conteDatos" type="text" placeholder="Nombre" name="nombre" value="<?php $row['Nombre']; ?>"> 
                        <input class="conteDatos" type="text" placeholder="Ap. paterno" name="apePat" value="<?php $row['ApePaterno']; ?>"> 
                        <input class="conteDatos" type="text" placeholder="Ap. materno" name="apeMat" value="<?php $row['ApeMaterno']; ?>"> 
                        <input class="conteDatos2" type="text" placeholder="Calle y número" name="calle" value="<?php $row['Calle']; ?>" > 
                        <input class="conteDatos2" type="text" placeholder="Colonia" name="colonia" value="<?php $row['Colonia']; ?>"> 
                        <input class="conteDatos2" type="text" placeholder="Municipio" name="municipio" value="<?php $row['Municipio']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Estado" name="estado" value="<?php $row['Estado']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Código postal" name="cp" value="<?php $row['CP']; ?>"> 
                        <input class="conteDatos3" type="text" placeholder="Teléfono" name="telefono" value="<?php $row['Telefono']; ?>">  
                        <input class="conteDatos4" type="text" placeholder="RFC" name="rfc" value="<?php $row['RFC']; ?>"> 
                        <input class="conteDatos4" type="text" placeholder="Titulo" name="titulo" value="<?php $row['Titulo']; ?>">
                        <input class="conteDatos4" type="text" placeholder="Correo" name="correo" value="<?php $row['Correo']; ?>">
                    </div> 
                    <div class="contenedor-botones" style="float: center;">
                    <input class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    <input class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    </div>
                </form>   
                </div>
            </body>
            </html>