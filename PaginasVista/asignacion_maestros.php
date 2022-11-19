<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');
$connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
$conexion=sqlsrv_connect(ServerName1, $connectionInfo);

$query="SELECT ClaveCa, NombreCarre FROM Carreras ";
$resultado= sqlsrv_query($conexion,$query);

$query1="SELECT ClaveMat, Nombre FROM Materias ";
$resultado1= sqlsrv_query($conexion,$query1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignación maestros</title>
    <link rel="stylesheet" href="/css/estilo_asignacion_maestros.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_ubicacion">
        <h1 class="ubicacion">ASIGNACIÓN MAESTROS</h1>
   </div>
    <div class="Contenedor_datos_asignacion">
        <div class="asignacion-datos-contenedor">
            <div class="social_asignacion">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="30%" >
                </div>
            </div>
            <form  method="POST" action="../ModificacionesBD/AsignaMaestros.php" class="cajas_de_texto_asignacion">
                <div><label >Carrera</label>
                <select class="combobox" name="carrera" id="carrera">
                    <?php
                    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){?>
                    <option value="<?php echo $row['ClaveCa'];?>"><?php echo $row['NombreCarre'];?></option>
                  <?php }
                   ?>
                    </select>
                </div>    
                <div>
                <label >Materia</label>
                <select class="combobox" name="materia" id="materia">
                    <?php

                    while($row0 = sqlsrv_fetch_array($resultado1, SQLSRV_FETCH_ASSOC)){?>
                    <option value="<?php echo $row0['ClaveMat'];?>"><?php echo $row0['Nombre'];?></option>
                  <?php }
                   ?>
                    </select>
                </div>   
                <label >Clave maestro</label>
                <input class="caja_texto" type="text" placeholder="" name="maestro" id="maestro">
                    <button id="btn" class="btn_guardar" name="guardar" onclick="location.href = '/ModificacionesBD/AsignaMaestros.php' " >Guardar</button>
                    <button class="btn_cancelar" name="cancela" onclick="location.href='https://controlescolarweb.azurewebsites.net'">Cancelar</button>    
            </form>
        </div>
    </div>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>