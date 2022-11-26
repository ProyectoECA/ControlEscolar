<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class InsertaFechaCorte{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #RECEPCIÓN DE FECHAS
        $mat=$_POST["materia"];
        $carre=$_POST["carrera"];
        $fechaR1=$_POST["real1"];
        $fechaR2=$_POST["real2"];
        $fechaR3=$_POST["real3"];

        $query="INSERT INTO [FechasCorte] (ClaveMat,NomCarrera,FechaC1,FechaC2,FechaC3) VALUES (?,?,?,?,?)";
        $parametros=array($mat,$carre,$fechaR1,$fechaR2,$fechaR3);
        $cone->Insertar_Eliminar_Actualizar($query,$parametros);
        
        $cone->CerrarConexion();
        echo"<script>alert('Fechas registradas con éxito');
                location.href='/PaginasVista/fechas_de_corte.php'</script>";
    }
}
$ins=new InsertaFechaCorte;
$ins->insertando();
?>