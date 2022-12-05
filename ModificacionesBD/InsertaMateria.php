<?php

include_once '../CRUD/Usuarios_password.php';
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Insertar_Mat{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        if($cone){
            $clave = $_POST["clave"]; 
            $nombre = $_POST["nombre"];
            $creditos = $_POST["creditos"]; 
            $carrera = $_POST["carre"]; 
            $unidades = $_POST["unidades"]; 
            $sem=$_POST["semestre"];
            $objetivos = $_POST["objetivos"]; 
            #COMPRUEBA QUE LA CLAVE NO ESTE REGISTRADA
            $query="SELECT * FROM [Materias] where ClaveMat=?";
            $parametros=array($clave);
            $res=$cone->Buscar($query,$parametros);

            if(empty($res)){
                #INSERTA EN TABLA MATERIAS
                $query= "INSERT INTO [Materias] (ClaveMat,Nombre,Creditos,Unidades,Objetivos,semestre) VALUES (?,?,?,?,?,?)";
                $parametros=array($clave,$nombre,$creditos,$unidades,$objetivos,$sem);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                #INSERTA EN TABLA FECHAS DE CORTE
                $query="SELECT Nombre FROM [Materias] where ClaveMat=?";
                $parametros=array($clave);
                $res=$cone->Buscar($query,$parametros);
                $nomCarre=$res[0]['Nombre'];
                
                $f1='';
                $f2='';
                $f3='';

                $query= "INSERT INTO [FechasCorte] (ClaveMat,NomCarrera,FechaC1,FechaC2,FechaC3) VALUES (?,?,?,?,?)";
                $parametros=array($clave,$nomCarre,$f1,$f2,$f3);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                #COMPRUEBA QUE LA MATERIA SE IMPARTA EN TODAS LAS CARRERAS, SE INSERTA EN LA TABLA CARREMATERIAS
                if($carrera=="Todas"){
                    $query= "SELECT ClaveCa from Carreras";
                    $resp=$cone->Buscar($query);
                    for($i=0;$i<count($resp);$i++){
                        $claveCa=$resp[$i]['ClaveCa'];
                        $query= "INSERT INTO [CarreMaterias] (ClaveMat,ClaveCa) VALUES (?,?)";
                        $parametros=array($clave,$claveCa);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                    }
                }
                #SI SOLO SE IMPARTE EN UNA CARRERA, SE INSERTA EN LA TABLA CARREMATERIAS
                else{
                    $query= "INSERT INTO [CarreMaterias] (ClaveMat,ClaveCa) VALUES (?,?)";
                    $parametros=array($clave,$carrera);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                }
                echo"<script>alert('Materia registrada con éxito');
                location.href='/PaginasVista/registro_materias.php'</script>";
                    
                $cone->CerrarConexion();
            }
            else{
                echo"<script>alert('La clave de la materia ya se encuentra registrada');
                location.href='/PaginasVista/registro_materias.php'</script>";
               
            }
            }
        else{
            echo"<script>alert('No se pudo establecer una conexión');
            location.href='/PaginasVista/registro_materias.php'</script>";
            
        }
    } 
    
}
$in= new Insertar_Mat;
$in->insertando();
?>

