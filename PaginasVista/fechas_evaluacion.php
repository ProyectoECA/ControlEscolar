<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

$claveMat=$_GET['claveMa'];
$carrera=$_GET['carrera'];
$claveCa=$_GET['claveCa'];

$cone=new CRUD_SQL_SERVER();
$cone->conexionBD();
/*
$que="SELECT ClaveCa from [Carreras] where NombreCarre=?";
$para=array($carrera);
$re=$cone->Buscar($que,$para);
$claveCa=$re[0]['ClaveCa'];*/

$query="SELECT ClaveMat,Nombre, Objetivos from [Materias] where ClaveMat=? and carrera=?";
$parametros=array($claveMat,$claveCa);
$res=$cone->Buscar($query,$parametros);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas evaluación</title>
    <link rel="stylesheet" href="/css/estilo_fechas_evaluacion.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="contenedor_titulo_2">
        <h1 class="titulo_de_tec"><b>TECNOLÓGICO DE NOCHISTLÁN</b></h1>
      </div>
      <div class="Contenedor_titulo">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
      </div>
      <div class="Contenedor_ubicacion">
           <h1 class="ubicacion">FECHAS DE EVALUACIÓN</h1>
      </div>    
      
      <article class="contenedor_tabla_general">
        <table  class="table-datos_generales"  id="tabla_unidades">
        <tbody>
            <tr>
                <td><?php echo $res[0]['ClaveMat'];?></td>
               </tr>
               <tr>
              <td><?php echo $res[0]['Nombre'];?></td>
               </tr>   
               <tr>
                <td><?php echo $res[0]['Objetivos'];?></td>
                   </tr>     
            </tbody>

        </table>

      </article>
    <br>
    <div class="Contenedor_tabla_evaluación">
         <table class="table-calificaciones">
            <thead>
                <tr>
                    <th>   </th>
                    <th>   </th>
                    <th> Programada  </th>
                    <th>   </th>
                    <th>  Real  </th>
                    <th>   </th>
                    <th> Evaluación </th>
                </tr>
             </thead>
            <thead>
                <tr>
                    <th>Temas</th>
                    <th>Subtemas</th>
                    <th>Inicio</th>
                    <th>Termino</th>
                    <th>Inicio</th>
                    <th>Termino</th>
                    <th>Programada</th>
                    <th>Real</th>
                </tr>
            </thead> 
            <tbody>
                <tr>
                <?php
                    #SABER CUANTAS UNIDADES TIENE LA MATERIA
                    $query1="SELECT * from CaptuUnidades where ClaveMat=?";
                    $parametros1=array($claveMat);
                    $res1=$cone->Buscar($query1,$parametros1);
                    
                    for($i=0;$i<count($res1);$i++){
                        #CONSULTA LOS DATOS DE CADA UNIDAD
                        $query2="SELECT TemaUni, Subtemas, ProI,ProT,RealI,RealT,EvaI,EvaT
                        FROM CaptuUnidades,FechasEva
                        WHERE CaptuUnidades.ClaveMat=? and FechasEva.ClaveMat=? 
                        and FechasEva.NoUniE=? and CaptuUnidades.NoUni=? ";
                        $parametros2=array($claveMat,$claveMat,($i+1),($i+1));
                        $res2=$cone->Buscar($query2,$parametros2);

                        #SE LLENE LA TABLA CON LOS DATOS QUE TIENE CADA UNIDAD
                        ?>
                        <td><a href="pagina_tema_1.php"><?php echo $res2[0]['TemaUni'];?></a></td>
                        <td><?php echo $res2[0]['Subtemas'];?></td>
                        <td><?php echo date_format($res2[0]['ProI'],"d/m/y");?></td>
                        <td><?php echo date_format($res2[0]['ProT'],"d/m/y");?></td>
                        <td><?php echo date_format($res2[0]['RealI'],"d/m/y");?></td>
                        <td><?php echo date_format($res2[0]['RealT'],"d/m/y");?></td>
                        <td><?php echo date_format($res2[0]['EvaI'],"d/m/y");?></td>
                        <td><?php echo date_format($res2[0]['EvaT'],"d/m/y");?></td>
                        </tr>

             <?php
                    }
              ?>
            </tbody>
         </table>

    </div>  
    <script src="../SesionesUsuario/session_expiracion.js"></script>
    <script src="../PaginasVista/script/fechas_Eva.js"></script>
</body>
</html>