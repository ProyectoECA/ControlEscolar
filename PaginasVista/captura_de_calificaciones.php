<?php
session_start();
include_once "../CRUD/CRUD_bd_SQLServer.php";

$claveMat=$_GET['claveMa'];
$carrera=$_GET['carrera'];
$claveCa=$_GET['claveCa'];

$cone=new CRUD_SQL_SERVER();
$cone->conexionBD();

$query = "SELECT Alumnos.NoControl FROM [CapturaCal], [Alumnos] WHERE Alumnos.NoControl = CapturaCal.NoControl 
and CapturaCal.ClaveCa = ? and CapturaCal.ClaveMat = ?";
$parametros = array($claveCa,$claveMat);
$res = $cone->Buscar($query,$parametros);

$query="SELECT Nombre FROM Materias where ClaveMat=?";
$parametros = array($claveMat);
$resul = $cone->Buscar($query,$parametros);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captura calificaciones</title>
    <link rel="stylesheet" href="/css/estilo_captura_calificaciones.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor_titulo_2">
        <h1 class="titulo_de_tec">TECNOLÓGICO DE NOCHISTLÁN</h1>
      </div>
      <div class="Contenedor_titulo">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
      </div>
      <div class="Contenedor_ubicacion">
           <h2 class="ubicacion">CAPTURA CALIFICACIONES</h2>
      </div>
      <div class="Contenedor_ubicacion">
           <h3 class="ubicacion"><?php echo $resul[0]['Nombre'];?></h3>
      </div>
    <form method="POST" action="/ModificacionesBD/CapturaCalif.php">
    <div class="contenedor-tabla">
        <input name="claveca" value="<?php echo $claveCa;?>" hidden>
        <input name="clavemat" value="<?php echo $claveMat;?>" hidden>
        <table class="table-cebra" id="tabla_calificaciones"> 
        <thead>
            <tr>
                <th> Nombre </th>
                <th> Número de control </th>
                <th> Repetición</th>
                <th> Calificación final</th>
                <th> Calificación unidad 1 </th>
                <th>Calificación unidad 2</th>
                <th>Calificación unidad 3</th>
                <th>Calificación unidad 4</th>
                <th>Calificación unidad 5</th>
                <th> Calificación unidad 6 </th>
                <th>Calificación unidad 7</th>
                <th>Calificación unidad 8</th>
                <th>Calificación unidad 9</th>
                <th>Calificación unidad 10</th>
            </tr>
            <?php
            #CONSULTA LAS FECHAS DE CORTE
            $query="SELECT * FROM FechasCorte where ClaveMat=? and NomCarrera=?";
            $parametros = array($claveMat,$claveCa);
            $feCo = $cone->Buscar($query,$parametros);
            $fec1=strtotime($feCo[0]['FechaC1']);
            $fec2=strtotime($feCo[0]['FechaC2']);
            $fec3=strtotime($feCo[0]['FechaC3']);

            #CONSULTA PARA VER CUANTAS UNIDADES TIENE LA MATERIA Y HABILITAR SUS UNIDADES CORRESPONDIENTES
            $query1="SELECT Unidades FROM Materias where ClaveMat=?";
            $parametros1 = array($claveMat);
            $res1 = $cone->Buscar($query1,$parametros1);
            $numUni=$res1[0]['Unidades'];

            for($i=0;$i<count($res);$i++){
                #CONSULTA PARA TODOS LOS ALUMNOS
                $query2 = "SELECT * FROM [CapturaCal], [Alumnos] WHERE Alumnos.NoControl = CapturaCal.NoControl 
                and CapturaCal.ClaveCa = ? and CapturaCal.ClaveMat = ? ORDER BY ApePaterno";
                $parametros2 = array($claveCa,$claveMat);
                $res2 = $cone->Buscar($query2,$parametros2);
                $nomComple=$res2[$i]['ApePaterno'].' '.$res2[$i]['ApeMaterno'].' '.$res2[$i]['Nombre'];

                #CONSULTA LAS FECHAS DE EVALUACION 
                $query3="SELECT EvaT FROM FechasEva where ClaveMat=? and ClaveCa=? and NoUniE=?";
                $parametros3 = array($claveMat,$claveCa,($i+1));
                $res3 = $cone->Buscar($query3,$parametros3);
                $fecha=strtotime($res3[0]['EvaT']);
                #COMPARA LAS FECHAS, si BAN=1 BLOQUE CAJAS, SI BAN=0 DESBLOQUEA CAJAS
                $ban=0;
                if($fec1==""){
                    $ban=0;
                }
                else if($fec1!=""){
                    if($fecha<$fec1){
                        #BLOQUE CAJAS DE FECHAS DE CORTE 1
                        echo "CORTE 1";
                        $ban=1;
                    }
                    else{
                        if($fec2!=""){
                            if($fecha<$fec2){
                                #BLOQUE CAJAS DE FECHAS DE CORTE 2
                                echo "CORTE 2";
                                $ban=1;
                            }
                            else{
                                if($fec3!=""){
                                    if($fecha<$fec3){
                                        #BLOQUE CAJAS DE FECHAS DE CORTE 3
                                        echo "CORTE 3";
                                        $ban=1;
                                    }
                                    else{
                                        #DESPUES DE PONER CORTE 3 YA NO SE PUEDEN MODIFICAR LAS CALIFICACIONES
                                        $ban=1;
                                    }
                                }
                                else{
                                    $ban=0;
                                }
                            }
                        }
                        else{
                            $ban=0;
                        }
                    }
                }





                $x=1;
                $state='';

                #SE LLENA LA TABLA CON LOS INPUTS DE CALIFICACIONES
                ?>
                <td><?php echo $nomComple;?></td>
                <td><input name="<?php echo 'noCon'.$i;?>" value=<?php echo $res2[$i]['NoControl'];?> readonly></td>
                <td><input value=<?php echo $res2[$i]['Repeticion'];?> readonly></td>
                <td><input name="<?php echo 'calfin'.$i;?>" value=<?php echo $res2[$i]['CalFinal'];?> readonly></td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal1'.$i;?>" value=<?php echo $res2[$i]['Uni1'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal2'.$i;?>" value=<?php echo $res2[$i]['Uni2'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal3'.$i;?>" value=<?php echo $res2[$i]['Uni3'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal4'.$i;?>" value=<?php echo $res2[$i]['Uni4'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal5'.$i;?>" value=<?php echo $res2[$i]['Uni5'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal6'.$i;?>" value=<?php echo $res2[$i]['Uni6'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal7'.$i;?>" value=<?php echo $res2[$i]['Uni7'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal8'.$i;?>" value=<?php echo $res2[$i]['Uni8'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal9'.$i;?>" value=<?php echo $res2[$i]['Uni9'];?> <?php $x++; echo $state;?>> </td>
                <?php if($x > $numUni or $ban==1){
                    $state='readonly';}?>
                <td><input name="<?php echo 'cal10'.$i;?>" value=<?php echo $res2[$i]['Uni10'];?> <?php $x++; echo $state;?>> </td>
            </tr>
             <?php
                    }
              ?>
         </thead>
         <tbody>
            
         </tbody>
        </table>
    </div>
    <button id="btn" type="submit" onclick="location.href ='/ModificacionesBD/CapturaCalif.php'">Guardar</button>
    <button type="button">Cancelar</button>
    </form>
    </div>   
    <!---<script src="../PaginasVista/script/captura_calificaciones_tabla.js "></script> -->
</body>
</html>