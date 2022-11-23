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
        <form method="POST">
        <div class="datos" style="float: center;">
            <input class="input" type="text" placeholder="Clave" id="clave1" name="clave1"> &nbsp;&nbsp;
            <select class="input" name="unidad1" id="unidad1">
                <option value="1">1</option> 
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>&nbsp;&nbsp;
            <input class="btnBuscar" type="submit" id="btn_buscar" value="BUSCAR" onclick="location.href = '/ModificacionesBD/IdUnidadMod.php' ">&nbsp;&nbsp;
            <input class="btnSalir" type="button"  value="CANCELAR">
        </div>
        </form>
        <form id="formulario_modificar_materias" action="/ModificacionesBD/ModificaUni.php" method="POST">
        <div class="contenedor_generalDatos">  
            <input id="clave" name="clave" class="parte1" type="text" placeholder="CLAVE"  value="<?php echo $row['ClaveMat']; ?>" readonly>
            <input id="numUni" name="numUni" class="parte1" type="text" placeholder="NÚMERO UNIDAD" value="<?php echo $row['NoUni']; ?>">
            <input id="tema" name="tema" class="parte2" type="text" placeholder="TEMA" style="float: left;" value="<?php echo $row['TemaUni']; ?>">
            <textarea id="sub" name="sub" class="textarea" cols="45" rows="8" style="float: right;"><?php echo $row['Subtemas']; ?></textarea>
        </div> 
        <div class="contebotones">
            <button id="btn" class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href = '/ModificacionesBD/ModificaUni.php' ">MODIFICA</button>
            <button id="btn" class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href = '/ModificacionesBD/ModificaUni.php' ">ELIMINA</button>
        </div>
    </form>
    
</body>
</html>