<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR ALUMNOS</title> 
    <link rel="stylesheet" href="/css/estilos_modificar_alumnos.css"> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
        <div class="logo" style="float: left;">
            <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
        </div>  
        <div class="nombre" style="float: center;"> 
            <div class="tituloP" style="float: left;">
                <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
            </div> 
        </div> 
        <div class="titulo1">
            <h2>MODIFICAR DATOS DE ESTUDIANTES</h2>
        </div> 
        <form  method="POST" >
        <div class="datos" style="float: center;">
            <input class="input" type="text" placeholder="NO. CONTROL" name="control">&nbsp;&nbsp;
            <input class="btnBuscar" type="button" value="BUSCAR"  onclick="location.href = '../ModificacionesBD/IdEstuMod.php' ">&nbsp;&nbsp;
            <input class="btnSalir" type="button" value="CANCELAR" onclick="location.href = 'https://controlescolarweb.azurewebsites.net' ">&nbsp;&nbsp;
        </div>
        </form>
       
        <form method="POST" action="../ModificacionesBD/ModificarEstu.php"  >
        <div class="contenedor_generalDatos">  
            <input id="control" class="parte1" type="text" placeholder="NO. CONTROL" value="<?php echo $row['NoControl']; ?>"  name="clave2" readonly>
            <input id="nombre" class="parte1" type="text" placeholder="NOMBRE(S)"  name="nombre" value="<?php echo $row['Nombre']; ?>">
            <input id="ap" class="parte1" type="text" placeholder="AP. PATERNO"  name="apePat" value="<?php echo $row['ApePaterno']; ?>">
            <input id="am" class="parte1" type="text" placeholder="AP. MATERNO" name="apeMat" value="<?php echo $row['ApeMaterno']; ?>">
            
            <input id="calle" class="parte2" type="text" placeholder="CALLE Y NÚMERO" name="calle" value="<?php echo $row['Calle']; ?>" >
            <input id="colonia" class="parte2" type="text" placeholder="COLONIA" name="colonia" value="<?php echo $row['Colonia']; ?>">
            <input id="municipio" class="parte2" type="text" placeholder="MUNICIPIO" name="municipio" value="<?php echo $row['Municipio']; ?>">
            <input id="estado" class="parte2" type="text" placeholder="ESTADO" name="estado" value="<?php echo $row['Estado']; ?>"> 

            <input id="cp" class="parte3" type="text" placeholder="CÓDIGO POSTAL" name="cp" value="<?php echo $row['CP']; ?>">
            <input id="tel" class="parte3" type="text" placeholder="NO. TELÉFONO" name="telefono" value="<?php echo $row['Telefono']; ?>">
            <input id="correo" class="parte3" type="text" placeholder="CORREO" name="correo" value="<?php echo $row['Correo']; ?>"> 

            <input id="nomtu" class="parte4" type="text" placeholder="NOMBRE COMPLETO DE PADRE O TUTOR" name="nomTutor" value="<?php echo $row['NomTutor']; ?>">
            <input id="teltu" class="parte4" type="text" placeholder="TELÉFONO DE PADRE O TUTOR" name="telTutor" value="<?php echo $row['TelTutor']; ?>">

            
        </div> 
        <div class="contenedor-botones" style="float: center;">
            <input disabled id="btn" class="botones" type="submit" name="modifica" value="EDITAR">
            <input disabled id="btn2" class="botones" type="submit" name="elimina" value="ELIMINAR" >
        </div>
    </form>
    <script src="modialumnos.js"></script>
    
    

</body>
</html>