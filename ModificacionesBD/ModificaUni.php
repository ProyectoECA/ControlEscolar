<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Modifica_Estu{
    
    function modificando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #RECEPCION DE DATOS
        $clave=$_POST["clave"];
        $nume=$_POST["numUni"];
        $tema=$_POST["tema"];
        $subtema=$_POST["sub"];

        if(isset($_POST['modifica'])){
            #MODIFICA EN TABLA CAPTUUNIDADES
            try{
                $query="UPDATE [CaptuUnidades] SET NoUni=? WHERE ClaveMat='".$clave."' and NoUni='".$nume."'";
                $parametros=array($nume);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [CaptuUnidades] SET TemaUni=?WHERE ClaveMat='".$clave."' and NoUni='".$nume."'";
                $parametros=array($tema);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [CaptuUnidades] SET Subtemas=? WHERE ClaveMat='".$clave."' and NoUni='".$nume."'";
                $parametros=array($subtema);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $cone->CerrarConexion();
                echo"<script>alert('Unidad modificada con éxito');
                        location.href='/PaginasVista/modificaUnidad.html'</script>";
            }
            catch(Exception $e){
                echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/modificaUnidad.html'</script>";
            }
        }
        else if(isset($_POST['elimina'])){
            try{
                $query="DELETE FROM [CaptuUnidades] WHERE ClaveMat=? and NoUni=?";
                $parametros=array($clave,$nume);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $cone->CerrarConexion();
                echo"<script>alert('Unidad eliminada con éxito');
                        location.href='/PaginasVista/modificaUnidad.html'</script>";
            }
            catch(Exception $e){
                echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/modificaUnidad.html'</script>";
            }
        }
    }

}

$mod=new Modifica_Estu;
$mod->modificando();
?>