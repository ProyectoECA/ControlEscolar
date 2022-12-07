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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Alumnos</title>
    <link rel="stylesheet" href="/css/estilo_alumnos.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_ubicacion">
        <h1 class="ubicacion">REGISTRO ESTUDIANTES</h1>
   </div>
    <div class="Contenedor_datos_alumnos">
        <div class="alumnos-datos-contenedor">
            <div class="social_alumnos">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="20%" >
                </div>
            </div>
            <!--<form class="cajas_de_texto_alumnos" action="#" id="formulario" method="POST">-->
           <form  method="POST" action="../ModificacionesBD/InsertaEstu.php" class="cajas_de_texto_alumnos">
                <label class="numero_de_control">No.control</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: TNM1234567899)" name="numerocontrol" id="numerocontrol">
                <label class="Nombre">Nombre</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: JUAN)" name="nombre" id="nombre">
                <label class="Apellido_pater">Apellido paterno</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: ARTEAGA)" name="apellidoP"
                    id="apellidoP">
                <label class="Apellido_mater">Apellido materno</label>    
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: MORENO)" name="apellidoM"
                    id="apellidoM">
                <label class="calle_numero">Calle y número</label>     
                <input class="caja_texto" type="text" placeholder="(HIDALGO #2)" name="calle" id="calle">
                <label class="Colonia">Colonia</label>  
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: CENTRO)" name="colonia" id="colonia">
                <label class="Municipio">Municipio</label>  
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: TEPECHITLAN)" name="municipio" id="municipio">
                <label class="estado">Estado</label>  
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: ZACATECAS)" name="estado" id="estado">
                <label class="Codigo_postal">Código postal</label> 
                <input class="caja_texto" type="int" placeholder="(EJEMPLO: 12345)" name="cp" id="cp">
                <label class="no_telefono">No.teléfono</label> 
                <input class="caja_texto" type="int" placeholder="(EJEMPLO: 1234567890)" name="tel" id="tel">
                <label class="correo">Correo</label>       
                <input class="caja_texto_email" type="email" placeholder="(EJEMPLO: JOSE@GMAIL.COM)" name="correo" id="correo">
                <div>
                <label class="carrera">Carrera</label>       
                <select class="combobox" name="selecion_carrera" id="selecion_carrera">
                    <?php
                    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){?>
                    <option value="<?php echo $row['ClaveCa'];?>"><?php echo $row['NombreCarre'];?></option>
                  <?php }
                   ?>
                    </select>
                </div>    
                <div>    
                <label class="semestre">Semestre</label>       
                <select class="combobox" name="selecion_semestre" id="selecion_semestre">
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
                    <option value="11">11</option>
                    <option value="12">12</option>
                    </select>  
                </div>      
                <label class="nombrepadre">Nombre del padre o tutor</label> 
                <input class="caja_texto" type="text" placeholder="(ejemplo: Alonso)" name="tutor"
                    id="tutor">
                <label class="telefonopadre">Teléfono del padre o tutor</label>     
                <input class="caja_texto" type="int" placeholder="(ejemplo: 1234567890)" name="teltutor"
                    id="teltutor">
                    <button disabled id="btn" class="btn_guardar" name="guardar" type="submit" onclick="location.href = '../ModificacionesBD/InsertaEstu.php' ">GUARDAR</button>
                    <button class="btn_cancelar" name="cancela" type="button" onclick="location.href='https://controlescolarweb.azurewebsites.net'">CANCELAR</button>    
            </form>
        </div>
    </div>
    <script src="../PaginasVista/script/cajas_alumnos.js"></script> 
    <script src="../SesionesUsuario/session_expiracion.js"></script>  
   <!-- <script src="../PaginasVista/script/alertaInsertaEstu.js"></script> -->
</body>
</html>