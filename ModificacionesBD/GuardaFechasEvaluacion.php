<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";


class Fecha_Evalua{
    function guardando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){

            $materia="45678";
            $noUni="0";
            $proI=$_POST["ProI"];
            $proT=$_POST["ProT"];
            $realI=$_POST["RealI"];
            $realT=$_POST["RealT"];
            $evaP=$_POST["EvaP"];
            $evaR=$_POST["EvaR"];

            $query="INSERT INTO [FechasEva] (ClaveMat,NoUniE,ProI,ProT,RealI,RealT,EvaI,EvaT) VALUES (?,?,?,?,?,?,?,?)";
            $parametros=array($materia,$noUni,$proI,$proT,$realI,$realT,$evaP,$evaR);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            echo"<script>alert('Las fechas se han guardado con éxito');
                        location.href='/PaginasVista/fechas_evaluacion.html'</script>";
        }
        else{
            echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/fechas_evaluacion.html'</script>";
        }
    }
}

$fec=new Fecha_Evalua;
$fec->guardando();