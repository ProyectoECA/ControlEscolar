<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";


class Fecha_Evalua{
    function guardando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){
            #CONFIGURAR FECHA DEL SISETMA
            date_default_timezone_set("America/Mexico_City");
            #$hora=date("Y-m-d H:i:s");

            $claveMat=$_POST['claveMat'];
            $noUni=$_POST['noUni'];
            $claveCa=$_POST['claveCa'];
            
            $proI=$_POST["ProI"];
            $proT=$_POST["ProT"];
            $realI=$_POST["RealI"];
            $realT=$_POST["RealT"];
            $evaP=$_POST["EvaP"];
            $evaR=$_POST["EvaR"];

            $proI=date("Y-m-d H:i:s");
            $proT=date("Y-m-d H:i:s");
            $realI=date("Y-m-d H:i:s");
            $realT=date("Y-m-d H:i:s");
            $evaP=date("Y-m-d H:i:s");
            $evaR=date("Y-m-d H:i:s");

            $query0="DELETE FROM FechasEva where ClaveMat=? and NoUniE=? and ClaveCa=?";
            $parametros0=array($claveMat,$noUni,$claveCa);
            $cone->Insertar_Eliminar_Actualizar($query0,$parametros0);

            $query="INSERT INTO [FechasEva] (ClaveMat,NoUniE,ProI,ProT,RealI,RealT,EvaI,EvaT,ClaveCa) VALUES (?,?,?,?,?,?,?,?,?)";
            $parametros=array($claveMat,$noUni,$proI,$proT,$realI,$realT,$evaP,$evaR,$claveCa);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            echo"<script>alert('Fechas guardadas con éxito')</script>";
                        

        }
        else{
            echo"<script>alert('No se puede establecer una conexión')</script>";
                       
        }
        $cone->CerrarConexion();
    }
}

$fec=new Fecha_Evalua;
$fec->guardando();