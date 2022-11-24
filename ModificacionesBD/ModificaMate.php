<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Modifica_Mate{
    
    function modificando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #RECEPCION DE DATOS
        $clave=$_POST["clave"];
        $nom=$_POST["nombre"];
        $credi=$_POST["creditos"];
        $carrera=$_POST["carre"];
        $uni=$_POST["unidad"];
        $sem=$_POST["semestre"];
        $obje=$_POST["obje"];

        if(isset($_POST['modifica'])){
            #MODIFICA EN TABLA MATERIAS
            try{
                $query="UPDATE [Materias] SET Nombre=? WHERE ClaveMat='".$clave."'";
                $parametros=array($nom);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [Materias] SET Creditos=? WHERE ClaveMat='".$clave."'";
                $parametros=array($credi);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [Materias] SET Carrera=? WHERE ClaveMat='".$clave."'";
                $parametros=array($carrera);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [Materias] SET Unidades=? WHERE ClaveMat='".$clave."'";
                $parametros=array($uni);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [Materias] SET Objetivos=? WHERE ClaveMat='".$clave."'";
                $parametros=array($obje);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $query="UPDATE [Materias] SET semestre=? WHERE ClaveMat='".$clave."'";
                $parametros=array($sem);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $cone->CerrarConexion();
                echo"<script>alert('Materia modificada con éxito');
                        location.href='/PaginasVista/modificar_materias.html'</script>";
            }
            catch(Exception $e){
                echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/modificar_materias.html'</script>";
            }
        }
        else if(isset($_POST['elimina'])){
            try{
                $query="DELETE FROM [Materias] WHERE ClaveMat=?";
                $parametros=array($clave);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                $cone->CerrarConexion();
                echo"<script>alert('Materia eliminada con éxito');
                        location.href='/PaginasVista/modificar_materias.html'</script>";
            }
            catch(Exception $e){
                echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/modificar_materias.html'</script>";
            }
        }
    }

}

$mod=new Modifica_Mate;
$mod->modificando();
?>