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
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlán</h1>
  </div>
    <div class="contenedor-tabla">
        <table class="table-cebra">
         <thead>
            <tr>
                <th class="sticky"> Clave </th>
                <th> Nombre </th>
                <th> Apellido Paterno </th>
                <th> Apellido Materno </th>
                <th> Calle y Número </th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Código Postal</th>
                <th> Teléfono </th>
                <th>RFC</th>
                <th>Titulo</th>
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
    <button type="submit" class="boton_consultar" onclick="location.href = '/ModificacionesBD/ConsultaMaes.php' ">Consultar</button>
    <div class="popup" id="popup">
      <input class="input" type="text" placeholder="Clave"><br>
      <input class="input" type="text" placeholder="Nombre "><br>
      <button class="boton_confirmar" type="button" onclick="closePopup()">Confirmar</button>
</div> 
    <button class="boton_cancelar"><a href="jefe_Control.html">Cancelar</button></a> 

    <script>
      let popup=document.getElementById("popup");
  
      function openPopup(){
          popup.classList.add("open-popup"); 
      }
      function closePopup(){
          popup.classList.remove("open-popup"); 
      }
  </script>  
    
</body>
</html>