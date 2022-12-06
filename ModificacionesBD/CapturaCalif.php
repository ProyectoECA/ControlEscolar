<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class InsertaCalificacion{
    function insertando(){
        $ban=0;
        //echo $ban;
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #SACAMOS LOS DATOS DE LA CARRERA Y MATERIA Y HACEMOS CONSULTA
        $mat=$_POST["clavemat"];
        $carre=$_POST["claveca"];

        /*$query = "SELECT Alumnos.NoControl FROM [CapturaCal], [Alumnos] WHERE Alumnos.NoControl = CapturaCal.NoControl 
        and CapturaCal.ClaveCa = ? and CapturaCal.ClaveMat = ?";
        $parametros = array($carre,$mat);
        $res = $cone->Buscar($query,$parametros);*/
        $query = "SELECT * FROM  CapturaCal WHERE CapturaCal.ClaveCa =? and CapturaCal.ClaveMat = ?";
        $parametros = array($carre,$mat);
        $res = $cone->Buscar($query,$parametros);
        
        $array_ban=array();
        $cuenta=count($res);
        for($i=0;$i<count($res);$i++){
            
            $ban=0;
            //echo $ban;
            #SACAMOS LOS ID DE LOS INPUTS
            $con='noCon'.$i;
            $calF='calfin'.$i;
            $u1='cal1'.$i;
            $u2='cal2'.$i;
            $u3='cal3'.$i;
            $u4='cal4'.$i;
            $u5='cal5'.$i;
            $u6='cal6'.$i;
            $u7='cal7'.$i;
            $u8='cal8'.$i;
            $u9='cal9'.$i;
            $u10='cal10'.$i;

            #SACAMOS LAS CALIFICACIONES A INSERTAR
            $noCont=$_POST["$con"];
            $calFin=$_POST["$calF"];
            $cal1=$_POST["$u1"];
            $cal2=$_POST["$u2"];
            $cal3=$_POST["$u3"];
            $cal4=$_POST["$u4"];
            $cal5=$_POST["$u5"];
            $cal6=$_POST["$u6"];
            $cal7=$_POST["$u7"];
            $cal8=$_POST["$u8"];
            $cal9=$_POST["$u9"];
            $cal10=$_POST["$u10"];
           
            //echo $cal1;

            //echo $cal1;

            #COMPARAMOS PARA SABER SI APROBO O NO
            $query1="SELECT Unidades FROM Materias where ClaveMat=?";
            $parametros1 = array($mat);
            $res1 = $cone->Buscar($query1,$parametros1);
            $val=$res1[0]['Unidades'];
            $x=0;
            $x++;
            if(!is_numeric($cal1)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal1=='N/A'){
                    $ban1=0;
                }
                else{
                $ban1=1;
                }
                //echo 'entre1';
            }
            else{
                if(intval($cal1)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban1=0;
                }
                else if(intval($cal1)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban1=1;
                }
                else{
                    $ban1=0;
                }
                //echo 'entre2';
            }
            $x++;
            if(!is_numeric($cal2)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal2=='N/A'){
                    $ban2=0;
                }
                else{
                $ban2=1;
                }
            }
            else{
                if(intval($cal2)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban2=0;
                }
                else if(intval($cal2)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban2=1;
                }
                else{
                    $ban2=0;
                }
            }
            $x++;
            if(!is_numeric($cal3)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal3=='N/A'){
                    $ban3=0;
                }
                else{
                $ban3=1;
                }
            }
            else{
                if(intval($cal3)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban3=0;
                }
                else if(intval($cal3)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban3=1;
                }
                else{
                    $ban3=0;
                }
            }
            $x++;
            if(!is_numeric($cal4)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal4=='N/A'){
                    $ban4=0;
                }
                else{
                $ban4=1;
                }
            }
            else{
                if(intval($cal4)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban4=0;
                }
                else if(intval($cal4)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban4=1;
                }
                else{
                    $ban4=0;
                }
            }
            $x++;
            if(!is_numeric($cal5)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal5=='N/A'){
                    $ban5=0;
                }
                else{
                $ban5=1;
                }
            }
            else{
                if(intval($cal5)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban5=0;
                }
                else if(intval($cal5)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban5=1;
                }
                else{
                    $ban5=0;
                }
            }
            $x++;
            if(!is_numeric($cal6)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal6=='N/A'){
                    $ban6=0;
                }
                else{
                $ban6=1;
                }
            }
            else{
                if(intval($cal6)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban6=0;
                }
                else if(intval($cal6)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban6=1;
                }
                else{
                    $ban6=0;
                }
            }
            $x++;
            if(!is_numeric($cal7)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal7=='N/A'){
                    $ban7=0;
                }
                else{
                $ban7=1;
                }
            }
            else{
                if(intval($cal7)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban7=0;
                }
                else if(intval($cal7)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban7=1;
                }
                else{
                    $ban7=0;
                }
            }
            $x++;
            if(!is_numeric($cal8)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal8=='N/A'){
                    $ban8=0;
                }
                else{
                $ban8=1;
                }
            }
            else{
                if(intval($cal8)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban8=0;
                }
                else if(intval($cal8)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban8=1;
                }
                else{
                    $ban8=0;
                }
            }
            $x++;
            if(!is_numeric($cal9)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal9=='N/A'){
                    $ban9=0;
                }
                else{
                $ban9=1;
                }
            }
            else{
                if(intval($cal9)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban9=0;
                }
                else if(intval($cal9)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban9=1;
                }
                else{
                    $ban9=0;
                }
            }
            $x++;
            if(!is_numeric($cal10)){
                #COMPRUEBA QUE NO SEA TEXTO, ESPACIO EN BLANCO
                if($cal10=='N/A'){
                    $ban10=0;
                }
                else{
                $ban10=1;
                }
            }
            else{
                if(intval($cal10)<70 and $x<intval($val)){
                    $cal1='N/A';
                    $ban10=0;
                }
                else if(intval($cal10)>100){
                    #COMPRUEBA QUE NO SEA MAYOR A 100
                    $ban10=1;
                }
                else{
                    $ban10=0;
                }
            }
            $x++;
            

            #VERIFICAMOS SI ESTA LA 3RA FECHA DE CORTE PARA CALCULAR PROMEDIO FINAL
            $query2="SELECT FechaC3 FROM FechasCorte where ClaveMat=?";
            $parametros2 = array($mat);
            $res2 = $cone->Buscar($query2,$parametros2);
            $val2=$res2[0]['FechaC3'];
            if($val2!='' or $val2!=' '){
                if($cal1=='N/A' or $cal2=='N/A' or $cal3=='N/A' or $cal4=='N/A' or $cal5=='N/A' 
                or $cal6=='N/A' or $cal7=='N/A' or $cal8=='N/A' or $cal9=='N/A' or $cal10=='N/A'){
                    $calFin='N/A';
                }
                else{
                    $suma=intval($cal1)+intval($cal2)+intval($cal3)+intval($cal4)+intval($cal5)+intval($cal6)+intval($cal7)+intval($cal8)+intval($cal9)+intval($cal10);
                    //echo $suma." -";
                    $prom=round(($suma)/intval($val));
                    //echo $prom." -";
                    $calFin=strval($prom);
                    //echo $calFin;
                }

            }

            array_push($array_ban,strval($ban1),strval($ban2),strval($ban3),strval($ban4),strval($ban5)
            ,strval($ban6),strval($ban7),strval($ban8),strval($ban9),strval($ban10));

            if($ban1==0 and $ban2==0 and $ban3==0 and $ban4==0 and $ban5==0 and $ban6==0 
            and $ban7==0 and $ban8==0 and $ban9==0 and $ban10==0){
                #ACTUALIZAMOS EN BD
            $query="UPDATE [CapturaCal] SET CalFinal=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($calFin,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni1=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal1,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni2=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal2,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni3=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal3,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni4=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal4,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni5=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal5,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni6=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal6,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni7=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal7,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni8=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal8,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni9=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal9,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE [CapturaCal] SET Uni10=? WHERE NoControl=? and ClaveMat=?";
            $parametros=array($cal10,$noCont,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);
            }
        }
        for($x=0;$x<count($array_ban);$x++){
            //echo 'HOLA '.$array_ban[$x];
            if($array_ban[$x]=='1'){
                $ban=1;
            }
          }
        if($ban==0){
            echo"<script>alert('Calificaciones registradas con éxito');
                location.href='/PaginasVista/principal_maestros.html'</script>";
        }
        if($ban==1){
            echo"<script>alert('Error al registrar algunas calificaciones, recuerda no se admite texto, simbolos y calificaciones mayores a 100');
                location.href='/PaginasVista/principal_maestros.html'</script>";
        }
        
    }
}
$ins=new InsertaCalificacion;
$ins->insertando();
?>