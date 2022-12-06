<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class InsertaFechaPlaneada{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #RECEPCIÓN DE FECHAS
        $f1=$_POST["date1"];
        $f2=$_POST["date2"];
        $f3=$_POST["date3"];

        $query="DELETE FROM [FechasPlaneadas]";
        $parametros=array('');
        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

        $query2="INSERT INTO [FechasPlaneadas] (FechaP1, FechaP2, FechaP3) VALUES (?,?,?)";
        $parametros=array($f1,$f2,$f3);
        $cone->Insertar_Eliminar_Actualizar($query2,$parametros);
        
        $cone->CerrarConexion();
        echo"<script>alert('Fechas registradas con éxito');
                location.href='/PaginasVista/Fechas_planeada_de_corte.html'</script>";
    }
}
$ins=new InsertaFechaPlaneada;
$ins->insertando();
?>