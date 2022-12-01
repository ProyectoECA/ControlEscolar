<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class InsertaCalificacion{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #SACAMOS LOS DATOS DE LA CARRERA Y MATERIA Y HACEMOS CONSULTA
        $mat=$_POST["clavemat"];
        $carre=$_POST["claveca"];

        $query = "SELECT Alumnos.NoControl FROM [CapturaCal], [Alumnos] WHERE Alumnos.NoControl = CapturaCal.NoControl 
        and CapturaCal.ClaveCa = ? and CapturaCal.ClaveMat = ?";
        $parametros = array($carre,$mat);
        $res = $cone->Buscar($query,$parametros);
        for($i=0;$i<count($res);$i++){
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

            #COMPARAMOS PARA SABER SI APROBO O NO
            $query1="SELECT Unidades FROM Materias where ClaveMat=?";
            $parametros1 = array($mat);
            $res1 = $cone->Buscar($query1,$parametros1);
            //var_dump($res1);
            $val=$res1[0]['Unidades'];
            //echo $val;
            $x=0;

            $x++;
            if(intval($cal1)<70 and $x<intval($val)){
                $cal1='N/A';
            }
            $x++;
            if(intval($cal2)<70 and $x<intval($val)){
                $cal2='N/A';
            }
            $x++;
            if(intval($cal3)<70 and $x<intval($val)){
                $cal3='N/A';
            }
            $x++;
            if(intval($cal4)<70 and $x<intval($val)){
                $cal4='N/A';
            }
            $x++;
            if(intval($cal5)<70 and $x<intval($val)){
                $cal5='N/A';
            }
            $x++;
            if(intval($cal6)<70 and $x<intval($val)){
                $cal6='N/A';
            }
            $x++;
            if(intval($cal7)<70  and $x<intval($val)){
                $cal7='N/A';
            }
            $x++;
            if(intval($cal8)<70 and $x<intval($val) ){
                $cal8='N/A';
            }
            $x++;
            if(intval($cal9)<70 and $x<intval($val)){
                $cal9='N/A';
            }
            $x++;
            if(intval($cal9)<70 and $x<intval($val)){
                $cal10='N/A';
            }

            #VERIFICAMOS SI ESTA LA 3RA FECHA DE CORTE PARA CALCULAR PROMEDIO FINAL
            $query2="SELECT FechaC3 FROM FechasCorte where ClaveMat=?";
            $parametros2 = array($mat);
            $res2 = $cone->Buscar($query2,$parametros2);
            $val2=$res2[0]['FechaC3'];
            if($val2!=''){
                if($cal1=='N/A' or $cal2=='N/A' or $cal3=='N/A' or $cal4=='N/A' or $cal5=='N/A' 
                or $cal6=='N/A' or $cal7=='N/A' or $cal8=='N/A' or $cal9=='N/A' or $cal10=='N/A'){
                    $calFin='N/A';
                }
                else{
                    $suma=intval($cal1)+intval($cal2)+intval($cal3)+intval($cal4)+intval($cal5)+intval($cal6)+intval($cal7)+intval($cal8)+intval($cal9)+intval($cal10);
                    echo $suma." -";
                    $prom=round(($suma)/intval($val));
                    echo $prom." -";
                    $calFin=strval($prom);
                    echo $calFin;
                }

            }

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
        echo"<script>alert('Calificaciones registradas con éxito');
                location.href='/PaginasVista/principal_maestros.html'</script>";
    }
}
$ins=new InsertaCalificacion;
$ins->insertando();
?>