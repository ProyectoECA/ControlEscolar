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

        $query="UPDATE FechasPlaneadas SET FechaP1=?";
        $parametros=array($f1);
        $cone->Insertar_Eliminar_Actualizar($query,$parametros);
         
        $query="UPDATE FechasPlaneadas SET FechaP2=?";
        $parametros=array($f2);
        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

        $query="UPDATE FechasPlaneadas SET FechaP3=?";
        $parametros=array($f3);
        $cone->Insertar_Eliminar_Actualizar($query,$parametros);
       
        
        $cone->CerrarConexion();
        echo"<script>alert('Fechas registradas con éxito');
                location.href='/PaginasVista/Fechas_planeada_de_corte.html'</script>";
    }
}
$ins=new InsertaFechaPlaneada;
$ins->insertando();
?>