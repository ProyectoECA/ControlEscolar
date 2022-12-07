<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

$cone=new CRUD_SQL_SERVER();
$cone->conexionBD();
$mat=$_POST["materia"];
$carre=$_POST["carrera"];

$query3="SELECT * FROM FechasCorte WHERE ClaveMat=? and NomCarrera=?";
$parametros=array($mat,$carre);
$resultado3=$cone->Buscar($query3, $parametros);

$query4="SELECT * FROM FechasPlaneadas";
$resultado4=$cone->Buscar($query4);

if(empty($resultado3)){
    echo"<script>alert('No existe la materia en la carrera seleccionada');
                location.href='/PaginasVista/fechas_corte.php'</script>";
}
?>

<!--comentario-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR MATERIAS</title> 
    <link rel="stylesheet" href="/css/estilos_fechasCorte.css"> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="principal">
        <div class="logo" style="float: left;"> 
            <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
        </div>  

        <div class="nombre" style="float: center;"> 
            <div class="tituloP" style="float: right;">
                <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
            </div> 
        </div> 
    </div> 
    <div class="titulo1">
        <h1>FECHAS DE CORTE</h1>
    </div> 
    <div class="contenedor-general">
        <form class="inputs-container"  method="POST" action="/ModificacionesBD/InsertaFechaCorte.php" >
            <br><br><br>
            <div class="conte-fechas">
                <label class="etiquetas"><b>Fecha 1</b></label><br><br>
                <label class="etiquetas1">Planeada</label>
                <input name="materia" value="<?php echo $mat;?>" hidden>
                <input name="carrera" value="<?php echo $carre;?>" hidden>
                <input class="input" type="text" name="plan1" id="plan1" value="<?php echo date_format($resultado4[0]['FechaP1'],"d-m-Y"); ?>" readonly>
                <label class="etiquetas1">Real</label>
                <input class="input" type="text" placeholder="01-01-2000" name="real1" id="real1" value="<?php echo $resultado3[0]['FechaC1'];?>"><br><br>

                <label class="etiquetas"><b>Fecha 2</b></label><br><br>
                <label class="etiquetas2">Planeada</label>
                <input class="input" value="<?php echo date_format($resultado4[0]['FechaP2'],"d-m-Y");?>" type="text" name="plan2" id="plan2" readonly>
                <label class="etiquetas2">Real</label>
                <input class="input" type="text" placeholder="01-01-2000" name="real2" id="real2" value="<?php echo $resultado3[0]['FechaC2'];?>"><br><br>

                <label class="etiquetas2"><b>Fecha 3</b></label><br><br>
                <label class="etiquetas3">Planeada</label>
                <input class="input" value="<?php echo date_format($resultado4[0]['FechaP3'],"d-m-Y");?>" type="text" name="plan3" id="plan3"readonly>
                <label class="etiquetas3">Real</label>
                <input class="input" type="text" placeholder="01-01-2000" name="real3" id="real3" value="<?php echo $resultado3[0]['FechaC3'];?>">
            </div>
            <div class="conte-botones">
                <button class="btn" id="btn"type="submit" onclick="location.href ='/ModificacionesBD/InsertaFechaCorte.php'">Guardar</button>
                <button class="btn" type="button" onclick="location.href='https://controlescolarweb.azurewebsites.net'">Cancelar</button> 
            </div>
        </form>
    </div>
</body>
</html>