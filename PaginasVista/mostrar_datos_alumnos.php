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
    <link rel="stylesheet" href="/css/estilo_muestra_datos_alumnos.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
    <title>Datos Alumnos</title>
</head>
<body>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlan</h1>
  </div>
  <form method="POST" action="/ModificacionesBD/ConsultaAlum.php">
    <div class="datos" style="float: center;">
      <select class="combobox" name="tipo_consulta" id="tipo_consulta">
      <option value="no_control">No. de control</option>
      <option value="nombre">Nombre</option>
      </select>
      <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato"><br>
      <input class="btnBuscar" type="submit" value="CONSULTAR" onclick="location.href='/ModificacionesBD/ConsultaAlum.php'">
      <input class="btnBuscar" type="submit" value="CANCELAR" onclick="location.href='/ModificacionesBD/ConsultaAlum.php'">
    </div> 
    </form>
    <div class="contenedor-tabla">
        <table class="table-cebra">
         <thead>
            <tr>
                <th class="sticky"> Numero de control </th>
                <th> Nombre </th>
                <th> Apellido paterno </th>
                <th> Apellido materno </th>
                <th> Calle y número </th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Código Postal</th>
                <th> Teléfono  </th>
                <th>Nombre del padre o tutor</th>
                <th>Teléfono  padre o tutor</th>
                <th>Correo</th>
            </tr>
         </thead>
         <tbody>
            <tr>
            <?php
              $connectionInfo = array("Database"=>Database2 , "UID"=>UID2, "PWD"=>PWD2, "CharacterSet"=>CharacterSet2);
              $conexion=sqlsrv_connect(ServerName2, $connectionInfo);
              $query="SELECT Alumnos.NoControl,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo
              FROM [Alumnos],[LugAlumnos],[Lugar] where (Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP)";
              $stmt = sqlsrv_query($conexion, $query);
              #$datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
              #echo sizeof($datos);

              while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                <td class="sticky"><?php echo $row['NoControl'];?></td>
                <td class="mostrar_datos"><?php echo $row['Nombre'];?></td>
                <td class="mostrar_datos"><?php echo $row['ApePaterno'];?></td>
                <td class="mostrar_datos"><?php echo $row['ApeMaterno'];?></td>
                <td class="mostrar_datos"><?php echo $row['Calle'];?></td>
                <td class="mostrar_datos"><?php echo $row['Colonia'];?></td>
                <td class="mostrar_datos"><?php echo $row['Municipio'];?></td>
                <td class="mostrar_datos"><?php echo $row['Estado'];?></td>
                <td class="mostrar_datos"><?php echo $row['CP'];?></td> 
                <td class="mostrar_datos"><?php echo $row['Telefono'];?></td>
                <td class="mostrar_datos"><?php echo $row['NomTutor'];?></td>
                <td class="mostrar_datos"><?php echo $row['TelTutor'];?></td>
                <td class="mostrar_datos"><?php echo $row['Correo'];?></td>
             </tr>
             </tbody>
             <?php
              }
              ?>
        </table>       
    
</body>
</html>