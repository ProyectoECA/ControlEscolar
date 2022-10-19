<?php
define("ServerName2", 'localhost');
define("Database2", "ConEscolarNoc");
define("UID2", "Admini");
define("PWD2", "control2022");
define("CharacterSet2", 'UTF-8');
?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script/consulSecre.js"></script>
<body>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlán</h1>
  </div>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="Contenedor_ubicacion">
    <h2 class="ubicacion">CONSULTA SECRETARIAS(OS)</h2>
</div>
  <form method="POST" action="/ModificacionesBD/ConsultaSecre.php">
    <div class="datos" style="float: center;">
      <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato" id="dato">
      <input class="btnBuscar" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php'">
    </div> 
    </form>
    <div class="contenedor-tabla">
        <table class="table" name="tablaSecre" id="tablaSecre">
         
    </div>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>
