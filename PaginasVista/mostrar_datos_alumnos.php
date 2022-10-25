
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/estilo_muestra_datos_alumnos.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
    <title>Datos Alumnos</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="script/consulAlum.js"></script>
<body>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">TECNOLÓGICO DE NOCHISTLÁN</h1>
  </div>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="Contenedor_ubicacion">
       <h2 class="ubicacion">CONSULTA ESTUDIANTES</h2>
  </div>
  <form method="POST" action="">
    <div class="datos" style="float: center;">
      <input class="input_busqueda" type="text" placeholder="INSERTA DATO" name="dato" id="dato"><br>
      <input class="btnBuscar" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php' ">
    </div> 
    </form>
    <div class="contenedor-tabla">
    <div class="table" name="tablaAlumnos" id="tablaAlumnos">
        <!-- <table class="table-cebra">
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
              /*$cone=new CRUD_SQL_SERVER();
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
              }*/
              ?>
        </table>    -->
        </div>
        </div>
        <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>