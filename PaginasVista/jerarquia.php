<?php
// conexion a la base de datos de sql server
 define("ServerName1", 'localhost');
  define("Database1", "ConEscolarNoc");
  define("UID1", "Admini");
  define("PWD1", "control2022");
  define("CharacterSet1", 'UTF-8');
  $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
  $conn=sqlsrv_connect(ServerName1, $connectionInfo);

$nom = $_POST['dato']; 

// consulta a base de datos
$sql = "SELECT alumnos.nocontrol,alumnos.nombre, CapturaCal.ClaveMat, FechasCorte.ClaveMat, 
CapturaCal.CalFinal, capturacal.repeticion 
from alumnos,capturacal,FechasCorte
where alumnos.NoControl=CapturaCal.NoControl and CapturaCal.ClaveMat = FechasCorte.ClaveMat
and FechasCorte.FechaC1 != '' and FechasCorte.FechaC2 != '' 
and FechasCorte.FechaC3 !='' and alumnos.nocontrol = '$nom' ";


$stmt = sqlsrv_query($conn, $sql);



if ($stmt != false) {
while($row = sqlsrv_fetch_array($stmt))
{

$aux=$row['ClaveMat'];



$ai=$row['ClaveMat'];

if( $row['CalFinal'] == 'N/A'){

    $sqlo = "UPDATE CapturaCal set repeticion='R' where ClaveMat= $ai";
    $stmto = sqlsrv_query($conn, $sqlo);
}

else if ($row['CalFinal'] != 'N/A') {
    //mandar una alerta a pantalla
    
    $sqlx = "UPDATE CapturaCal set repeticion='P' where ClaveMat= $ai";
    $stmtx = sqlsrv_query($conn, $sqlx);

    //buscar materia en jerarquia y capturacal
    $sqd = "SELECT materias.nombre, jerarquiamat.jeramaterias, jerarquiamat.clavemat,jerarquiamat.adelante
    from capturacal,materias,jerarquiamat where
    capturacal.ClaveMat = materias.ClaveMat
     and materias.ClaveMat = jerarquiamat.ClaveMat and capturacal.ClaveMat = $aux";
    $stmn = sqlsrv_query($conn, $sqd);
    
    $adelante='';
  if ($stmn!=false){
    while($rows = sqlsrv_fetch_array($stmn))
    {
        $adelante=$rows['adelante'];

        //comprobar que si tiene materias asociadas
        $a=explode(",",$rows['jeramaterias']);
        $arreglo=array();
        foreach($a as $b){

          $b1=true;

          $sqlz = "SELECT materias.nombre,capturacal.calfinal 
          from materias,capturacal 
          where materias.ClaveMat = $b and materias.ClaveMat = capturacal.ClaveMat" ; 
        $sz = sqlsrv_query($conn, $sqlz);

           
        if ($sz!=false){
          while($rowc = sqlsrv_fetch_array($sz, SQLSRV_FETCH_ASSOC)){

          if ($rowc['calfinal']>=7){
              $b1=true;
          }
          else{
            $b1=false;
            
          }

          $arreglo[$b]=$b1;
          
          
          }
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

            $nocontrol=$row['nocontrol'];

            $sqlh = "INSERT into CapturaCal values('$nocontrol','$adelante','P',0,0,0,0,0,0,0,0,0,0,0)";
          $sh = sqlsrv_query($conn, $sqlh); 
        }
        
    }
  }
    
}
}
}
echo "<script>alert('ACCION EXITOSA');</script>";

?>