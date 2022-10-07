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
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlán</h1>
  </div>
  <form method="POST" action="/ModificacionesBD/ConsultaSecre.php">
    <div class="datos" style="float: center;">
      <select class="combobox" name="tipo_consulta" id="tipo_consulta">
      <option value="clave">Clave</option>
      <option value="nombre">Nombre</option>
      </select>
      <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato">
      <input class="btnBuscar" type="submit" value="CONSULTAR" onclick="location.href='/ModificacionesBD/ConsultaSecre.php'">
      <input class="btnBuscar" type="button" value="CANCELAR"  onclick="location.href='http://localhost/index.php'">
    </div> 
    </form>
    <div class="contenedor-tabla">
        <table class="table-cebra" id="Secre">
         <thead>
            <tr>
                <th class="sticky"> No.Empleado </th>
                <th> Nombre </th>
                <th> Apellido paterno </th>
                <th> Apellido materno </th>
                <th> Calle y número </th>
                <th>Colonia</th>
                <th>Municipio</th>
                <th>Estado</th>
                <th>Código Postal</th>
                <th> Teléfono </th>
                <th>Correo</th>
            </tr>
         </thead>
         <tbody>
            <tr>
<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Consulta_Secre{

    function consultando(){
        $tipo=$_POST["tipo_consulta"];
        $dato=$_POST["dato"];
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
            if($tipo=='clave'){
              $query="SELECT Secretarias.IdSec,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,Correo
              FROM [Secretarias],[LugSecretarias],[Lugar] where (Secretarias.IdSec like ? and Secretarias.IdSec=LugSecretarias.IdSec and LugSecretarias.CP=Lugar.CP)";
              $parametros=array('%'.$dato.'%');
              $stmt = sqlsrv_query($conexion, $query, $parametros);

              while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                <td class="sticky"><?php echo $row['IdSec'];?></td>
                <td class="mostrar_datos"><?php echo $row['Nombre']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApePaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApeMaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Calle']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Colonia']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Municipio']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Estado']; ?></td>
                <td class="mostrar_datos"><?php echo $row['CP']; ?></td> 
                <td class="mostrar_datos"><?php echo $row['Telefono']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Correo']; ?></td>
             </tr>
             <?php
              }
              
            }
            if($tipo=='nombre'){
              $query="SELECT Secretarias.IdSec,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,Correo
              FROM [Secretarias],[LugSecretarias],[Lugar] where (Nombre like ? and Secretarias.IdSec=LugSecretarias.IdSec and LugSecretarias.CP=Lugar.CP)";
              $parametros=array('%'.$dato.'%');
              $stmt = sqlsrv_query($conexion, $query, $parametros);

              while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                <td class="sticky"><?php echo $row['IdSec'];?></td>
                <td class="mostrar_datos"><?php echo $row['Nombre']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApePaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['ApeMaterno']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Calle']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Colonia']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Municipio']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Estado']; ?></td>
                <td class="mostrar_datos"><?php echo $row['CP']; ?></td> 
                <td class="mostrar_datos"><?php echo $row['Telefono']; ?></td>
                <td class="mostrar_datos"><?php echo $row['Correo']; ?></td>
             </tr>
             <?php
              }
            }
        }
        catch(Exception $e){?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Ocurrio un error al consultar los datos',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed) {
                location.href='../PaginasVista/mostrar_datos_secretarias.php';
            }
            else{
                location.href='../PaginasVista/mostrar_datos_secretarias.php';
            }
            window.history.back('/PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
    }
}
$con=new Consulta_Secre;
$con->consultando();
?>
</tbody>
</table> 
</body>
</html>