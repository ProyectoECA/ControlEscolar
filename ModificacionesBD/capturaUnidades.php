<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Registra_Unidad{
    function registrando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){
            $id=$_POST["clave"];
            $uni=$_POST["unidad"];
            $tema=$_POST["tema"];
            $sub=$_POST["subtema"];
            //echo $id.$uni.$tema.$sub;

            $query="INSERT INTO [CapUnidades] (ClaveMat,NoUni,TemaUni,Subtemas) VALUES (?,?,?,?)";
            $parametros=array($id,$uni,$tema,$sub);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            echo"<script>alert('Unidad capturada con éxito');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
        }
        else{
            echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
        }
    }
}

$reg=new Registra_Unidad;
$reg->registrando();