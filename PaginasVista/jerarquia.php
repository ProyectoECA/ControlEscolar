<?php


$dato = $_POST['dato'];  
           //conexion a base de datos sql server

/* echo $dato; */


  define("ServerName1", 'localhost');
  define("Database1", "ConEscolarNoc");
  define("UID1", "Admini");
  define("PWD1", "control2022");
  define("CharacterSet1", 'UTF-8');
  $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
  $conn=sqlsrv_connect(ServerName1, $connectionInfo);




 /*  if($conn){
      echo "Conexión establecida.<br />";
  }else{
      echo "Conexión no se pudo establecer.<br />";
      die(print_r(sqlsrv_errors(), true));
  } */
  //consulta a base de datos
 /*  $sql = "SELECT nocontrol,nombre FROM alumnos";
  $stmt = sqlsrv_query($conn, $sql); */
  //consulta con la variable dato igual


  //consulta para materias del mismo semestre
  $sql = " SELECT alumnos.nombre,materias.Nombre, materias.creditos FROM alumnos, CarreAlumnos,Carreras,JerarquiaMat,materias 
  where  alumnos.NoControl=CarreAlumnos.NoControl and CarreAlumnos.ClaveCa =Carreras.ClaveCa 
  and Carreras.ClaveCa = JerarquiaMat.ClaveCa and CarreAlumnos.Semestre = Materias.semestre
  and ( materias.Carrera='Todas' or CarreAlumnos.ClaveCa=Materias.Carrera) and alumnos.nombre like '$dato'" ;
  $stmt = sqlsrv_query($conn, $sql);
 

  //consultas de mateerias reprobadas
  $sql = "SELECT alumnos.nombre,materias.Nombre, materias.creditos
  from alumnos, CapturaCal,materias where alumnos.NoControl=CapturaCal.NoControl and CapturaCal.ClaveMat=Materias.ClaveMat 
  and CapturaCal.repeticion = 're' and alumnos.nombre like '$dato'  " ;
  $stm = sqlsrv_query($conn, $sql);
  
  //consulta de matrais con jerequia
  $sql = "SELECT jerarquiamat.jeramaterias,alumnos.nombre,materias.Nombre, materias.creditos 
  from alumnos,materias,CapturaCal, JerarquiaMat 
  where alumnos.NoControl = CapturaCal.NoControl and CapturaCal.ClaveMat = materias.ClaveMat 
  and JerarquiaMat.ClaveMat = Materias.ClaveMat and  alumnos.nombre like '$dato' and capturaCal.repeticion != 'ap' " ;
  $st = sqlsrv_query($conn, $sql);

  if($stmt === false){
      die(print_r(sqlsrv_errors(), true));
  }
  //imprimir datos en una tabla
  echo "<table class='tabla'>";
  echo "<tr><th>Nombre</th><th>nombre</th><th>creditos</th></tr>";

 //filas de consulta 1

  while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
    //poner nocontrol , nombre nombre de carrera materias
    echo "<tr><td>".$row['nombre']."</td><td>".$row['Nombre']."</td><td>".$row['creditos']."</td></tr>";

//filas de consulta 2

  }
  while($row = sqlsrv_fetch_array($stm, SQLSRV_FETCH_ASSOC)){
    //poner nocontrol , nombre en la misma fila y el numero 1 en la columna 0
    echo "<tr><td>".$row['nombre']."</td><td>".$row['Nombre']."</td><td>".$row['creditos']."</td></tr>";

 //filas de consulta 3

  }
  while($row = sqlsrv_fetch_array($st, SQLSRV_FETCH_ASSOC)){
    
    $a=explode(",",$row['jeramaterias']);
    foreach($a as $b){
      /* echo $b; */
      $b1=true;

      $sql = "SELECT alumnos.nombre,materias.nombre,materias.creditos,capturacal.calfinal,capturacal.repeticion 
      from capturacal,alumnos,materias where capturacal.claveMat = '$b' 
      and alumnos.nombre like '$dato' and alumnos.NoControl = capturacal.NoControl 
      and capturacal.clavemat = materias.clavemat" ;
      $s = sqlsrv_query($conn, $sql);
      while($row1 = sqlsrv_fetch_array($s, SQLSRV_FETCH_ASSOC)){

      if ($row1['calfinal']>=7){
          $b1=true;
      }
      else{
        $b1=false;
      }
     
      $arreglo[$b]=$b1;
      
      
      }
    }
  //imprimir datos de $arreglo
    $b2=true;
    foreach($arreglo as $key){
      if($key!=true){
        $b2=false;
      }
    }
  
      if($b2==true){
      echo "<tr><td>".$row['nombre']."</td><td>".$row['Nombre']."</td><td>".$row['creditos']."</td></tr>";
        /* echo "Aprobada";  */
        //imprimir los datos del arreglo $arreglo
    //imprimir datos de arreglo1 y arreglo2 al mismo tiempo
      
        //echo "<tr><td>".$row['alumnos.nombre']."</td><td>".$row['materias.Nombre']."</td><td>".$row['materias.creditos']."</td></tr>";
        echo "aprobada";
      
    }
      /* else{
        echo "Reprobada";
      } */
    
    
  }
  echo "</table>";
  sqlsrv_free_stmt($stmt);
   
  ?>