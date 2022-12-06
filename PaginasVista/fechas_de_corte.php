<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

$cone=new CRUD_SQL_SERVER();
$cone->conexionBD();

$query="SELECT ClaveMat,Nombre FROM Materias";
$parametros=array('');
$resultado=$cone->Buscar($query,$parametros);

$query2="SELECT ClaveCa,NombreCarre FROM Carreras ";
$resultado2=$cone->Buscar($query2,$parametros);

$query3="SELECT * FROM FechasPlaneadas";
$resultado3=$cone->Buscar($query3,$parametros);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas de corte</title>
    <link rel="stylesheet" href=".../css/estilo_fechas_corte.css">
</head>
<body>
    <div class="nombre" style="float: center;">
        <h1><b>TECNOLÓGICO DE NOCHISTLÁN</b></h1>
    </div> 
      <div class="Contenedor_titulo">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
      </div>
      <div class="Contenedor_ubicacion">
           <h2 class="ubicacion">FECHAS CORTE</h2>
      </div>

      <div class="login-container">
        <div class="login-info-container">
            <form class="inputs-container"  method="POST" action="/ModificacionesBD/InsertaFechaCorte.php" >
                <label class="carrera"><b>Carrera</b></label>
                <select class="combobox_carrera" name="carrera" id="carrera">
                    <option value="<?php echo $resultado2[0]['NombreCarre'];?>"><?php echo $resultado2[0]['NombreCarre'];?></option>
                   <option value="Todas">TODAS</option>
                </select>
                <label class="clave_mate"><b>Materia</b></label>
                <select class="combobox_materia" name="materia" id="materia">
                    <option value="<?php echo $resultado[0]['ClaveMat'];?>"><?php echo $resultado[0]['Nombre'];?></option>
                </select>
                <label class="fecha_1"><b>Fecha 1</b></label>
                <label class="planeada">Planeada</label>
                <input class="input_planeada" type="text" name="plan1" id="plan1" value="<?php echo date_format($resultado3[0]['FechaP1'],"d/m/Y"); ?>" readonly>
                <label class="real_fecha_1">Real</label>
                <input class="input_real_fecha_1" type="date" name="real1" id="real1">
                <label class="fechas_2"><b>Fecha 2</b></label>
                <label class="planeada_fecha_2">Planeada</label>
                <input class="input_planeada_fecha_2" value="<?php echo date_format($resultado3[0]['FechaP2'],"d/m/Y")?>" type="text" name="plan2" id="plan2" readonly>
                <label class="real_fecha_2">Real</label>
                <input class="input_real_fecha_2" type="date" placeholder="Contraseña" name="real2" id="real2">
                <label class="fechas_3"><b>Fecha 3</b></label>
                <label class="planeada_fecha_3">Planeada</label>
                <input class="input_planeada_fecha_3" value="<?php echo date_format($resultado3[0]['FechaP3'],"d/m/Y");?>" type="text" name="plan3" id="plan3"readonly>

                <label class="real_fecha_3">Real</label>
                <input class="input_real_fecha_3" type="date" placeholder="Contraseña" name="real3" id="real3">
                <div class="bot">
                    <button class="btn" style="float: right;" id="btn"type="submit" onclick="location.href ='/ModificacionesBD/InsertaFechaCorte.php'">Guardar</button>
                    <button class="btn" style="float: left;" type="button" onclick="location.href='https://controlescolarweb.azurewebsites.net'">Cancelar</button> 
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>