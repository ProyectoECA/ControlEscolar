<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR UNIDADES</title> 
    <link rel="stylesheet" href="/css/estilos_modificar_unidades.css"> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <form action="" id="formulario_modificar_materias">
        <div class="logo" style="float: left;">
            <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
        </div>  

        <div class="nombre" style="float: center;"> 
            <div class="tituloP" style="float: left;">
                <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
            </div> 
        </div> 
        <div class="titulo1">
            <h2>MODIFICAR DATOS DE LAS UNIDADES</h2>
        </div> 
        <div class="datos" style="float: center;">
            <input class="input" type="text" name="clave_buscar" placeholder="Clave" > &nbsp;&nbsp;
            <input class="btnBuscar" type="submit" id="btn_buscar" value="BUSCAR" >&nbsp;&nbsp;
            <input class="btnSalir" type="button"  value="CANCELAR">
        </div>
        <div class="contenedor_generalDatos">  
            <input class="parte1" type="text" placeholder="CLAVE" value="<?php echo $row['ClaveMat']; ?>" readonly>
            <input class="parte1" type="text" placeholder="NOMBRE"  value="<?php echo $row['ClaveMa']; ?>">
        </div> 
        <div class="contebotones">
            <button class="botones">MODIFICA</button>
            <button class="botones">ELIMINA</button>
        </div>
    </form>
    
</body>
</html>