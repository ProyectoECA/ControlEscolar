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
    <title>Datos Maestros</title>
</head>
<body>
<div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlán</h1>
  </div>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="Contenedor_ubicacion">
    <h2 class="ubicacion">Consulta Maestros</h2>
</div>
  <form method="POST" action="../ModificacionesBD/ConsultaMaes.php">
    <div class="datos" style="float: center;">
      <select class="combobox" name="tipo_consulta" id="tipo_consulta">
      <option value="clave">Clave</option>
      <option value="nombre">Nombre</option>
      </select>
      <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato">
      <input class="btnBuscar" type="submit" value="CONSULTAR" onclick="location.href='/ModificacionesBD/ConsultaMaes.php'">
      <input class="btnBuscar" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php'">
    </div> 
    </form>
    <div class="contenedor-tabla">
        <table class="table-cebra">
         <thead>
            <tr>
                <th class="sticky"> Clave </th>
                <th> Nombre </th>
                <th> Apellido paterno </th>
                <th> Apellido materno </th>
                <th> Calle y número </th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Código postal</th>
                <th> Teléfono </th>
                <th>RFC</th>
                <th>Título</th>
                <th>Correo</th>
            </tr>
         </thead>
         <tbody>
            <tr>
            <?php
              $connectionInfo = array("Database"=>Database2 , "UID"=>UID2, "PWD"=>PWD2, "CharacterSet"=>CharacterSet2);
              $conexion=sqlsrv_connect(ServerName2, $connectionInfo);


              $query="SELECT Maestros.ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
              FROM [Maestros],[LugMaestros],[Lugar] where (Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP)";
              $stmt = sqlsrv_query($conexion, $query);
              #$datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
              #echo sizeof($datos);

              while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                <td class="sticky"><?php echo $row['ClaveMa'];?></td>
                <td class="mostrar_datos"><?php echo $row['Nombre']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApePaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApeMaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Calle']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Colonia']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Municipio']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Estado']; ?></td>
                <td class="mostrar_datos"><?php echo $row['CP']; ?></td> 
                <td class="mostrar_datos"><?php echo $row['Telefono']; ?></td>
                <td class="mostrar_datos"><?php echo $row['RFC']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Titulo']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Correo']; ?></td>
  
             </tr>
             </tbody>
             <?php
              }
              ?>
        </table>
    </div>
    
    

    <script>
      let popup=document.getElementById("popup");
  
      function openPopup(){
          popup.classList.add("open-popup"); 
      }
      function closePopup(){
          popup.classList.remove("open-popup"); 
      }
  </script>  
  <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>