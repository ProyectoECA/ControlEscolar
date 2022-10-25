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
                    <div class="titulo">
                        <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
                    </div> 
                    <h2>MODIFICAR DATOS DE MAESTROS(AS)</h2>  
                </div>
                <form method="POST">
                <div class="datos" style="float: center;">
                    <input class="input" type="text" placeholder="Clave" name="clave1">&nbsp;&nbsp;
                    <input class="btnBuscar" type="submit" value="BUSCAR" onclick="location.href = '/ModificacionesBD/IdMaesMod.php' ">&nbsp;&nbsp;
                    <input class="btnSalir" type="button" value="CANCELAR"  onclick="location.href='http://localhost/index.php'">&nbsp;&nbsp;
                </div>
                </form>
                <div class="contenedor-general" style="float: center;">
                <form  method="POST" action="../ModificacionesBD/ModificaMaes.php" >
                    <div class="contenedor-datos" style="float: center;">
                        <input id="numeroe" class="conteDatos" type="text" placeholder="CLAVE"  value="<?php echo $row['ClaveMa']; ?>"  name="clave2" readonly>
                        <input id="nombre" class="conteDatos" type="text" placeholder="NOMBRE" name="nombre" value="<?php echo $row['Nombre']; ?>"> 
                        <input id="ap" class="conteDatos" type="text" placeholder="AP. PATERNO" name="apePat" value="<?php echo $row['ApePaterno']; ?>"> 
                        <input id="am" class="conteDatos" type="text" placeholder="AP. MATERNO" name="apeMat" value="<?php echo $row['ApeMaterno']; ?>"> 
                        <input id="calle" class="conteDatos2" type="text" placeholder="CALLE Y NÚMERO" name="calle" value="<?php echo $row['Calle']; ?>" > 
                        <input id="colonia" class="conteDatos2" type="text" placeholder="COLONIA" name="colonia" value="<?php echo $row['Colonia']; ?>"> 
                        <input id="municipio" class="conteDatos2" type="text" placeholder="MUNICIPIO" name="municipio" value="<?php echo $row['Municipio']; ?>"> 
                        <input id="estado" class="conteDatos3" type="text" placeholder="ESTADO" name="estado" value="<?php echo $row['Estado']; ?>"> 
                        <input id="cp" class="conteDatos3" type="text" placeholder="CÓDIGO POSTAL" name="cp" value="<?php echo $row['CP']; ?>"> 
                        <input id="tel" class="conteDatos3" type="text" placeholder="TELÉFONO" name="telefono" value="<?php echo $row['Telefono']; ?>">  
                        <input id="rfc" class="conteDatos4" type="text" placeholder="RFC" name="rfc" value="<?php echo $row['RFC']; ?>"> 
                        <input id="titulo" class="conteDatos4" type="text" placeholder="TÍTULO" name="titulo" value="<?php echo $row['Titulo']; ?>">
                        <input id="correo" class="conteDatos4" type="text" placeholder="CORREO" name="correo" value="<?php echo $row['Correo']; ?>">
                    </div> 
                    <div class="contenedor-botones" style="float: center;">
                    <input disabled id="btn" class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    <input disabled id="btn2" class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href = '/ModificacionesBD/ModificaMaes.php' ">
                    </div>
                </form>   
                </div>
                <script src="modimaestros.js"></script>
            </body>
            </html>