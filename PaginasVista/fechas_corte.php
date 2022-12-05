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
        <div class="conte1">
            <div class="contenedor-izquierda">
                <label class="etiquetas"><b>Carrera</b></label>
                    <select class="combos" name="carrera" id="carrera">
                        <option value="<?php echo $resultado2[0]['NombreCarre'];?>"><?php echo $resultado2[0]['NombreCarre'];?></option>
                    <option value="Todas">TODAS</option>
                    </select>
            </div>
            <div class="contenedor-derecha">
                <label class="etiquetas"><b>Materia</b></label>
                    <select class="combos" name="materia" id="materia">
                        <option value="<?php echo $resultado[0]['ClaveMat'];?>"><?php echo $resultado[0]['Nombre'];?></option>
                    </select>
            </div>
        </div>
        <div class="conte-fechas">
            <label class="etiquetas"><b>Fecha 1</b></label><br><br>
            <label class="etiquetas1">Planeada</label>
            <input class="input" type="text" name="plan1" id="plan1" value="<?php echo $resultado3[0]['FechaP1']; ?>" readonly>
            <label class="etiquetas1">Real</label>
            <input class="input" type="text" placeholder="01/01/2000" name="real1" id="real1"><br><br>

            <label class="etiquetas"><b>Fecha 2</b></label><br><br>
            <label class="etiquetas2">Planeada</label>
            <input class="input" value="<?php echo $resultado3[0]['FechaP2'];?>" type="text" name="plan2" id="plan2" readonly>
            <label class="etiquetas2">Real</label>
            <input class="input" type="text" placeholder="01/01/2000" name="real2" id="real2"><br><br>

            <label class="etiquetas2"><b>Fecha 3</b></label><br><br>
            <label class="etiquetas3">Planeada</label>
            <input class="input" value="<?php echo $resultado3[0]['FechaP3'];?>" type="text" name="plan3" id="plan3"readonly>
            <label class="etiquetas3">Real</label>
            <input class="input" type="text" placeholder="01/01/2000" name="real3" id="real3">
        </div>
        <div class="conte-botones">
            <button class="btn" id="btn"type="submit" onclick="location.href ='/ModificacionesBD/InsertaFechaCorte.php'">Guardar</button>
            <button class="btn" type="button" onclick="location.href='http://localhost/index.php'">Cancelar</button> 
        </div>
    </div>
</body>
</html>