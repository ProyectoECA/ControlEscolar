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
                $query= "INSERT INTO [Materias] (ClaveMat,Nombre,Creditos,Carrera,Unidades,Objetivos,semestre) VALUES (?,?,?,?,?,?,?)";
                $parametros=array($clave,$nombre,$creditos,$carrera,$unidades,$objetivos,$sem);
                $cone->Insertar_Eliminar_Actualizar($query,$parametros);
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
