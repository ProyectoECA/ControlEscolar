<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');
?>
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
    <div class="logo" style="float: left;">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
    </div> 
    <div class="nombre" style="float: center;">
        <h1><b>TECNOLÓGICO DE NOCHISTLÁN</b></h1>
    </div> 
    <form method="POST" action="/ModificacionesBD/GetIDSecreMod.php">
    <div class="datos" style="float: center;">
        <input class="input" type="text" placeholder="No. Empleado" name="noEmpl">&nbsp;&nbsp;
        <input class="btnBuscar" type="submit" value="BUSCAR">
    </div> 
    </form>
    <div class="contenedor-general" style="float: center;">
        <form method="POST" action="/ModificacionesBD/ModificaSecre.php">
        <div class="contenedor-datos" style="float: center;">
        </div> 
        </form>
    </div>
</body>
</html>
<?php
$file=fopen("../ModificacionesBD/ModSecre.txt","w");
fwrite($file,"");
fclose($file);
?>
