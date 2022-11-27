<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

$claveMat=$_GET['claveMa'];
$noUni=$_GET['NoUni'];
$claveCa=$_GET['claveCa'];

echo $claveMat;
echo $noUni;
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
    <title>Temario</title>
    <link rel="stylesheet" href="/css/estilo_tema_1.css">
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
           <h1 class="ubicacion">TEMARIO</h1>
      </div>    
      
      <article class="contenedor_tabla_general">
        <table  class="table-datos_generales" >
        <tbody>
            <tr>
                <td>NOMBRE DE LA MATERIA DE LA BASE DE DATOS</td>
               </tr>
               <tr>
              <td>CLAVE DE LA MATERIA DE LA BASE DE DATOS</td>
               </tr>   
               <tr>
                <td>OBJETIVOS DE LA BASE DE DATOS</td>
                   </tr>     
            </tbody>

        </table>

      </article>
    <div>  
    <form class="formulario_de_tabla" method="POST" action="../ModificacionesBD/GuardaFechasEvaluacion.php">
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
                       <td><a href="ventana_auxiliar_qr.html"> 01 El secmento de aprender etica  </a></td>
                       <td> Se saca de la base de datos </td>
                       <td><input class="caja_de_texto_fecha" type="date" name="ProI" id="Pro"></td>
                       <td><input class="caja_de_texto_fecha" type="date" name="ProT" id="ProT"></td>
                       <td><input class="caja_de_texto_fecha" type="date" name="RealI" id="RealI"></td>
                       <td><input class="caja_de_texto_fecha" type="date" name="RealT" id=RealT></td>
                       <td><input class="caja_de_texto_fecha" type="date" name="EvaP" id="EvaP"></td>
                       <td><input class="caja_de_texto_fecha" type="date" name="EvaR" id="EvaR"></td>
                   </tr>
               </tbody>
            </table>   
        <div class="contenedor_botones">    
            <input  id="btn" class="btnGuardar" type="submit" value="GUARDAR">
        </div>    
    </form>  
</div>
</body>
</html>