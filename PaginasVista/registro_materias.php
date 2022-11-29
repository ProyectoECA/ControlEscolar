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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro materias</title>
    <link rel="stylesheet" href="/css/estilo_registro_materias.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_ubicacion">
        <h1 class="ubicacion">REGISTRO MATERIAS</h1>
   </div>
    <div class="Contenedor_datos_materias">
        <div class="materias-datos-contenedor">
            <div class="social_materias">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="20%" >
                </div>
            </div>
            <form  method="POST" action="../ModificacionesBD/InsertaMateria.php" class="cajas_de_texto_materias">
                <label >Clave</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: ASD-1234)" name="clave" id="clave">
                <label >Nombre</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: SISTEMAS)" name="nombre" id="nombre" >
                <label >Créditos</label>
                <input class="caja_texto" type="text" placeholder="(EJEMPLO: 1)" name="creditos" id="creditos" >
                <div>
                <label >Carreras</label>
                <select class="combobox" name="carre" id="carre">
                    <option value="Todas">Todas</option>
                    <?php
                    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){?>
                    <option value="<?php echo $row['ClaveCa'];?>"><?php echo $row['NombreCarre'];?></option>
                  <?php }
                   ?>
                </select>
                </div>
                <div>    
                <label> Unidades </label>
                    <select class="combobox" name="unidades" id="unidades">
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
                    </select>   
                </div> 
                <div>
                  <label>Semestres</label>
                   <select class="combobox" name="semestre" id="semestre">
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                     <option value="6">6</option>
                     <option value="7">7</option>
                     <option value="8">8</option>
                     <option value="9">9</option>
                   </select> 
                </div>  
                <label>Objetivos</label>      
                <textarea name="objetivos" id="objetivos" class="textarea" cols="45" rows="8"></textarea>

                    <button disabeled id="btn" class="btn_guardar" name="guardar" onclick="location.href = '../ModificacionesBD/InsertaMateria.php' ">GUARDAR</button>
                    <!-- <button disabled id="btn" class="btn_guardar" name="guardar" onclick="validar()">GUARDAR</button> -->
                    <button class="btn_cancelar" name="cancela" onclick="location.href='http://localhost/index.php'">CANCELAR</button>    
            </form>
        </div>
    </div>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
    <script src="../PaginasVista/script/cajas_materias.js"></script>
</body>
</html>