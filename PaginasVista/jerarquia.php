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

//definir variable
$cal=$row['CalFinal'];

if( $cal == 'N/A'){
    $rep="R";
    $sqlo = "UPDATE CapturaCal set repeticion=? where ClaveMat= ? and NoControl=?";
    $parametros=array($rep,$ai,$nom);
    $stmto = sqlsrv_query($conn, $sqlo,$parametros);

}

else if ($cal != 'N/A') {
    //mandar una alerta a pantalla

    $rep="P";
    $sqlx = "UPDATE CapturaCal set repeticion=? where ClaveMat= ? and NoControl=?";
    $parametros=array($rep,$ai,$nom);
    $stmtx = sqlsrv_query($conn, $sqlx,$parametros);
  
    //buscar materia en jerarquia y capturacal
    $sqd = "SELECT  JeraMaterias, jerarquiamat.clavemat, Adelante, CapturaCal.ClaveCa
    from capturacal,jerarquiamat where
    capturacal.ClaveMat =  jerarquiamat.ClaveMat and capturacal.ClaveMat =? and CapturaCal.NoControl=?";
     $parametros1=array($aux,$nom);
    $stmn = sqlsrv_query($conn, $sqd,$parametros1);

    #$adelante='';
 
  if ($stmn!=false){
    while($rows = sqlsrv_fetch_array($stmn))
    {

        $adelante=$rows['Adelante'];
        $carrera=$rows['ClaveCa'];

        //comprobar que si tiene materias asociadas
        $a=explode(",",$rows['JeraMaterias']);
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
            $adela=explode(",",$rows['Adelante']);
            foreach($adela as $des){

              $ca="0";
              $rep="P";
              $query= "INSERT INTO [CapturaCal] (NoControl,ClaveMat,ClaveCa,Repeticion,CalFinal,Uni1,Uni2,Uni3,Uni4,Uni5,Uni6,Uni7,Uni8,Uni9,Uni10) 
              VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
              $parametros=array($nom,$des,$carrera,$rep,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca);
              $sh = sqlsrv_query($conn, $query, $parametros); 
            }
            
          /*$sqlh = "INSERT into CapturaCal values('$nocontrol','$adelante','P',0,0,0,0,0,0,0,0,0,0,0)";
          $sh = sqlsrv_query($conn, $sqlh); */
        }
        
    }
  }
  else{
            $ca="0";
            $rep="P";
            $query= "INSERT INTO [CapturaCal] (NoControl,ClaveMat,ClaveCa,Repeticion,CalFinal,Uni1,Uni2,Uni3,Uni4,Uni5,Uni6,Uni7,Uni8,Uni9,Uni10) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $parametros=array($nom,$adelante,$carrera,$rep,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca,$ca);
          $sh = sqlsrv_query($conn, $query, $parametros); 
  }
    
}
}
}
echo "<script>alert('ACCIÓN EXITOSA')
location.href='/PaginasVista/asignacion_reticula.php'</script>;"

?>