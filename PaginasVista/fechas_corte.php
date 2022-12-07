<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

$cone=new CRUD_SQL_SERVER();
$cone->conexionBD();

$query="SELECT ClaveMat,Nombre FROM Materias";
$resultado=$cone->Buscar($query);

$query2="SELECT ClaveCa,NombreCarre FROM Carreras ";
$resultado2=$cone->Buscar($query2);

$query3="SELECT * FROM FechasCorte";
$resultado3=$cone->Buscar($query3);

$query4="SELECT * FROM FechasPlaneadas";
$resultado4=$cone->Buscar($query4);
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
        <form class="inputs-container" method="POST" action="/PaginasVista/fechas_de_corte.php" >
            <div class="conte1">
                <div class="contenedor-izquierda">
                    <label class="etiquetas"><b>Carrera</b></label><br>
                        <select class="combos" name="carrera" id="carrera">
                            <?php for($i=0;$i<count($resultado2);$i++){?>
                            <option value="<?php echo $resultado2[$i]['NombreCarre'];?>"><?php echo $resultado2[$i]['NombreCarre'];?></option>
                            <?php }?>
                        </select>
                </div>
                <div class="contenedor-derecha">
                    <label class="etiquetas"><b>Materia</b></label><br>
                        <select class="combos" name="materia" id="materia">
                        <?php for($i=0;$i<count($resultado);$i++){?>
                            <option value="<?php echo $resultado[$i]['ClaveMat'];?>"><?php echo $resultado[$i]['Nombre'];?></option>
                            <?php }?>
                        </select>
                </div>
            </div>
            <div class="conte-botones">
                <button class="btn" id="btn" type="submit" onclick="location.href ='/PaginasVista/fechas_de_corte.php'">Buscar</button>
                <button class="btn" type="button" onclick="location.href='http://localhost/index.php'">Cancelar</button> 
            </div>
        </form>
    </div>
</body>
</html>