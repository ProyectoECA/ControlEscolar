<?php
define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');
$connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
$conexion=sqlsrv_connect(ServerName1, $connectionInfo);

$query="SELECT ClaveCa, NombreCarre FROM Carreras ";
$resultado= sqlsrv_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR MATERIAS</title> 
    <link rel="stylesheet" href="/css/estilos_modificar_materias.css"> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
        <div class="principal">
            <div class="logo" style="float: left;"> 
                <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
            </div>  

            <div class="nombre" style="float: center;"> 
                <div class="tituloP" style="float: right;">
                    <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
                </div> 
            </div> 
        </div> 
        <div class="titulo1">
            <h2>MODIFICAR DATOS DE LAS MATERIAS</h2>
        </div> 
        <form method="POST">
        <div class="datos" style="float: center;">
            <input name="clave1" id="clave1" class="input" type="text" placeholder="Clave">&nbsp;&nbsp;
            <input class="btnBuscar" type="submit" id="btn_buscar" value="BUSCAR" onclick="location.href = '../ModificacionesBD/IdMateMod.php' ">&nbsp;&nbsp;
            <input class="btnSalir" type="button"  value="CANCELAR">
        </div>
        </form>
        <form action="/ModificacionesBD/ModificaMate.php" id="formulario_modificar_materias" method="POST">
        <div class="contenedor_generalDatos">  
            <input class="parte1" type="text" placeholder="CLAVE"  name="clave" id="clave" value="<?php echo $row['ClaveMat']; ?>" readonly>
            <input class="parte1" type="text" placeholder="NOMBRE"  name="nombre" id="nombre" value="<?php echo $row['Nombre']; ?>">
            <input class="parte1" type="text" placeholder="CRÉDITOS" name="creditos" id="creditos"value="<?php echo $row['Creditos']; ?>">  
            <select class="parte2" placeholder="CARRERA" name="carre" id="carre" value="<?php echo $row['Carrera']; ?>">
                <?php
                    if($row['Carrera']=='Todas'){?>
                        <option value="Todas">Todas</option>
                    <?php
                    }
                    else{
                        $query2="SELECT ClaveCa, NombreCarre FROM Carreras WHERE ClaveCa='".$row['Carrera']."'";
                        $resultado2= sqlsrv_query($conexion,$query);
                        $row1 = sqlsrv_fetch_array($resultado2, SQLSRV_FETCH_ASSOC);?>
                        <option value="<?php echo $row1['ClaveCa'];?>"><?php echo $row1['NombreCarre'];?></option>
                    <?php
                    }
                    while($row2 = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){?>
                    <option value="<?php echo $row2['ClaveCa'];?>"><?php echo $row2['NombreCarre'];?></option>
                  <?php }
                   ?>
            </select>
            <select class="parte2" name="unidad" id="unidad" value="<?php echo $row['Unidades']; ?>">
                <option value="<?php echo $row['Unidades']; ?>"><?php echo 'Unidad '.$row['Unidades']; ?></option>
                <option value="1">Unidad 1</option>
                <option value="2">Unidad 2</option>
                <option value="3">Unidad 3</option>
                <option value="4">Unidad 4</option>
                <option value="5">Unidad 5</option>
                <option value="6">Unidad 6</option>
                <option value="7">Unidad 7</option>
                <option value="8">Unidad 8</option>
                <option value="9">Unidad 9</option>
                <option value="10">Unidad 10</option>
            </select> 
            <select class="parte2" name="semestre" id="semestre" value="<?php echo $row['semestre']?>">
                <option value="<?php echo $row['semestre']?>"><?php echo $row['semestre'].' semestre'; ?></option>
                <option value="1">1 semestre</option>
                <option value="2">2 semestre</option>
                <option value="3">3 semestre</option>
                <option value="4">4 semestre</option>
                <option value="5">5 semestre</option>
                <option value="6">6 semestre</option>
                <option value="7">7 semestre</option>
                <option value="8">8 semestre</option>
                <option value="9">9 semestre</option>
            </select>      
            <textarea id="obje" name="obje" class="textarea" cols="45" rows="8" style="float: right;"><?php echo $row['Objetivos']; ?></textarea>
        </div> 
        <div class="contebotones">
        <button id="btn" class="botones" type="submit" name="modifica" value="EDITAR" onclick="location.href = '/ModificacionesBD/ModificaMate.php' ">MODIFICA</button>
            <button id="btn" class="botones" type="submit" name="elimina" value="ELIMINAR" onclick="location.href = '/ModificacionesBD/ModificaMate.php' ">ELIMINA</button>
        </div>
    </form>
    <script src="modimaterias.js"></script>
</body>
</html>