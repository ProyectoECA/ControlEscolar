<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";


class Fecha_Evalua{
    function guardando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){
            $claveMat=$_POST['claveMat'];
            $noUni=$_POST['noUni'];
            $claveCa=$_POST['claveCa'];
            
            $proI=$_POST["ProI"];
            $proT=$_POST["ProT"];
            $realI=$_POST["RealI"];
            $realT=$_POST["RealT"];
            $evaP=$_POST["EvaP"];
            $evaR=$_POST["EvaR"];

            $query="UPDATE FechasEva SET ProI=?,ProT=?,RealI=?,RealT=?,EvaI=?,EvaT=? WHERE ClaveMat=? and NoUniE=? and ClaveCa=? ";
            $parametros=array($proI,$proT,$realI,$realT,$evaP,$evaR,$claveMat,$noUni,$claveCa);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);
            
            echo"<script>alert('Fechas guardadas con éxito')
            location.href='/PaginasVista/principal_maestros.html'</script>";
                        

        }
        else{
            echo"<script>alert('No se puede establecer una conexión')
            location.href='/PaginasVista/principal_maestros.html'</script>";
                       
        }
        $cone->CerrarConexion();
    }
}

$fec=new Fecha_Evalua;
$fec->guardando();