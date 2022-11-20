<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Registra_Unidad{
    function registrando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){
            $id=$_POST["clave"];
            $uni=$_POST["unidad"];
            $tema=$_POST["tema"];
            $sub=$_POST["subtema"];

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName, $connectionInfo);
            //echo $id.$uni.$tema.$sub;
            $query="SELECT Unidades FROM Materias WHERE ClaveMat='".$id."'";
            $datos=sqlsrv_query($conexion,$query);
            $ban=True;
            while($row = sqlsrv_fetch_array($datos)){
                $unidad=$row["Unidades"];
                if($uni>intval($unidad)){
                    $ban=False;
                }
            }
            if($ban==False){
                echo"<script>alert('Esta unidad no existe en la materia');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
            }
            else{
            $query="INSERT INTO [CaptuUnidades] (ClaveMat,NoUni,TemaUni,Subtemas) VALUES (?,?,?,?)";
            $parametros=array($id,$uni,$tema,$sub);
            $cone->Insertar_Eliminar_Actualizar($query,$parametros);

            echo"<script>alert('Unidad capturada con éxito');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
            }
        }
        else{
            echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
        }
    }
}


$reg=new Registra_Unidad;
$reg->registrando();