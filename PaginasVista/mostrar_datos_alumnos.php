<?php
define("ServerName2", 'localhost');
define("Database2", "ConEscolarNoc");
define("UID2", "Admini");
define("PWD2", "control2022");
define("CharacterSet2", 'UTF-8');
include_once "../CRUD/CRUD_bd_SQLServer.php";
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
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlán</h1>
  </div>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="Contenedor_ubicacion">
       <h2 class="ubicacion">Consulta alumnos</h2>
  </div>
  <form method="POST" action="/ModificacionesBD/ConsultaAlum.php">
    <div class="datos" style="float: center;">
      <select class="combobox" name="tipo_consulta" id="tipo_consulta">
      <option value="no_control">No. de control</option>
      <option value="nombre">Nombre</option>
      </select>
      <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato" id="dato"><br>
      <input class="btnBuscar" type="submit" value="CONSULTAR" onclick="location.href='/ModificacionesBD/ConsultaAlum.php'">
      <input class="btnBuscar" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php' ">
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
              $cone=new CRUD_SQL_SERVER();
              $cone->conexionBD();

              $query="SELECT Alumnos.NoControl,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo
              FROM [Alumnos],[LugAlumnos],[Lugar] where Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP";
              $res=$cone->Buscar($query);
              for($i=0;$i<count($res);$i++){?>
                <td class="sticky"><?php echo $res[$i]['NoControl'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Nombre'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['ApePaterno'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['ApeMaterno'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Calle'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Colonia'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Municipio'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Estado'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['CP'];?></td> 
                <td class="mostrar_datos"><?php echo $res[$i]['Telefono'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['NomTutor'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['TelTutor'];?></td>
                <td class="mostrar_datos"><?php echo $res[$i]['Correo'];?></td>
             </tr>
             </tbody>
             <?php
              }
              ?>
        </table>       
        <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>