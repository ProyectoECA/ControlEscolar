<?php

include_once "../CRUD/CRUD_bd_SQLServer.php";
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

$connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
$conexion=sqlsrv_connect(ServerName1, $connectionInfo);


class Asigna_Maes{
    function asignacion(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

        if($cone){
            $idCarre = $_POST["carrera"]; 
            $idMat = $_POST["materia"];
            $maestro = $_POST["maestro"]; 

            if($idCarre=="0"){
                $query="SELECT * FROM Carreras";
                $resul= sqlsrv_query($conexion,$query);
                $c=0;
                while($row = sqlsrv_fetch_array($resul)) {
                    $dato= $row['ClaveCa']; 

                    $query="SELECT * FROM [AsigMaes] where ClaveMat=? and ClaveCa=? and Maestro=?";
                    $parametros=array($idMat,$dato,$maestro);
                    $res=$cone->Buscar($query,$parametros);
                    if(empty($res)){
                        $query= "INSERT INTO [AsigMaes] (ClaveMat,ClaveCa,Maestro) VALUES (?,?,?)";
                        $parametros=array($idMat,$dato,$maestro);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                    }
                    else{
                        $c++;
                    }
                
            }
            if($c!=0){
                echo"<script>alert('Ya se encontraba registrada alguna asignación');
                location.href='/PaginasVista/asignacion_maestros.php'</script>";
            }
            else{
                echo"<script>alert('Asignaciones realizadas con éxito');
                location.href='/PaginasVista/asignacion_maestros.php'</script>";
            }
            
            }
            else{
                
            #COMPRUEBA QUE LA MATERIA NO ESTE ASIGNADA A MAESTRO
            $query="SELECT * FROM [AsigMaes] where ClaveMat=? and ClaveCa=? and Maestro=?";
            $parametros=array($idMat,$idCarre,$maestro);
            $res=$cone->Buscar($query,$parametros);

            if(empty($res)){
                #INSERTA EN TABLA ASIGNAMAES
                $query= "INSERT INTO [AsigMaes] (ClaveMat,ClaveCa,Maestro) VALUES (?,?,?)";
                $parametros=array($idMat,$idCarre,$maestro);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                echo"<script>alert('Asignación realizada con éxito');
                location.href='/PaginasVista/asignacion_maestros.php'</script>";
                    
                $cone->CerrarConexion();
            }
            else{
                echo"<script>alert('La asignación ya se encuentra registrada');
                location.href='/PaginasVista/asignacion_maestros.php'</script>";
               
            }
            }
        }
        else{
            echo"<script>alert('No se pudo establecer una conexión');
            location.href='/PaginasVista/asignacion_maestros.php'</script>";
            
        }

           
    } 
    
}
$in= new Asigna_Maes;
$in->asignacion();
?>
