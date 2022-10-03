<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilo_muestra_datos_maestros.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
    <title>Datos Secretaria</title>
</head>
<body>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlan</h1>
  </div>
  <form method="POST" action="/CamContra.php">
    <div class="datos" style="float: center;">
      <input class="input" type="text" placeholder="Contraseña Nueva" name="contra1">
      <input class="input" type="text" placeholder="Confirmación" name="contra2">
      <input class="btnBuscar" type="submit" value="GUARDAR" onclick="location.href='/CamContra.php'">
    </div> 
    </form>
</body>
</html>

