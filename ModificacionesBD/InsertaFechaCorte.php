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

        $query="SELECT ClaveMat FROM FechasCorte";
        $resul = $cone->Buscar($query);
        $materia=$resul[0]['ClaveMat'];

        if(empty($materia)){
            $query="INSERT INTO [FechasCorte] (ClaveMat,NomCarrera,FechaC1,FechaC2,FechaC3) VALUES (?,?,?,?,?)";
            $parametros=array($mat,$carre,$fechaR1,$fechaR2,$fechaR3);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);
        }
        else{
            $query="UPDATE FechasCorte SET FechaC1=? where ClaveMat=?";
            $parametros=array($fechaR1,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE FechasCorte SET FechaC2=? where ClaveMat=?";
            $parametros=array($fechaR2,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            $query="UPDATE FechasCorte SET FechaC3=? where ClaveMat=?";
            $parametros=array($fechaR3,$mat);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);
        }
        
        $cone->CerrarConexion();
        echo"<script>alert('Fechas registradas con éxito');
                location.href='/PaginasVista/fechas_corte.php'</script>";
    }
}
$ins=new InsertaFechaCorte;
$ins->insertando();
?>