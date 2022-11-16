<?php


define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');
class Modificar_Estudiantes {

    function modificando(){

        #RECEPCIÓN DE DATOS
        $clave = $_POST["clave2"]; 
        $nombre = $_POST["nombre"]; 
        $apePaterno = $_POST["apePat"]; 
        $apeMaterno = $_POST["apeMat"]; 
        $calle = $_POST["calle"]; 
        $colonia = $_POST["colonia"]; 
        $municipio = $_POST["municipio"]; 
        $estado = $_POST["estado"]; 
        $cp = $_POST["cp"]; 
        $telefono = $_POST["telefono"];  
        $correo = $_POST["correo"]; 
        $nomTutor = $_POST["nomTutor"]; 
        $telTutor = $_POST["telTutor"]; 


        if(isset($_POST['modifica'])){

        #MODIFICA EN TABLA MAESTROS
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #VERIFICA SI EL CODIGO POSTAL YA ESTA
            $query="SELECT * FROM [Lugar] where cp=?";
            $parametros=array($cp);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            $arreResul= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
            if(empty($arreResul)){
                $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                $parametros=array($cp, $municipio, $estado);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                
           
            }
            #SI EL CP YA ESTA REGISTRADO, SOLO MODIFICA MUNICIPIO Y/O ESTADO
            else{
                $query="UPDATE Lugar SET Municipio= ? WHERE cp = ?";
                $parametros=array($municipio,$cp);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                $query="UPDATE Lugar SET Estado= ? WHERE cp = ?";
                $parametros=array($estado,$cp);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
               
            }
            #MOFICA RELACIÓN DE ALUMNO Y LUGAR
            $query="UPDATE LugAlumnos SET cp= ? WHERE NoControl =?";
            $parametros=array($cp,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            #MODIFICA TODOS LOS ATRIBUTOS DE TABLA ALUMNOS
            $query="UPDATE Alumnos SET Nombre=? where NoControl=?";
            $parametros=array($nombre,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            

            $query="UPDATE Alumnos SET ApePaterno= ? WHERE NoControl = ?";
            $parametros=array($apePaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET ApeMaterno= ? WHERE NoControl = ?";
            $parametros=array($apeMaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET Telefono= ? WHERE NoControl = ?";
            $parametros=array($telefono,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET Correo= ? WHERE NoControl = ?";
            $parametros=array($correo,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET Calle= ? WHERE NoControl = ?";
            $parametros=array($calle,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET Colonia= ? WHERE NoControl = ?";
            $parametros=array($colonia,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET NomTutor= ? WHERE NoControl = ?";
            $parametros=array($nomTutor,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Alumnos SET TelTutor= ? WHERE NoControl = ?";
            $parametros=array($telTutor,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            
            #Lama alerta de Modificación con exito
            echo"<script>alert('Estudiante modificado con éxito')</script>";
            include_once("../PaginasVista/modifica_alumnos2.html");
           
                
            sqlsrv_close($conexion);
        }
        catch(Exception $e){
            echo"<script>alert('No se pudo modificar el estudiante')</script>";
            include_once("../PaginasVista/modifica_alumnos2.html");
            //location.href='PaginasVista/modifica_alumnos2.php'</script>";
            
        }
    }
    else if(isset($_POST['elimina'])){
        #ELIMINA MAESTROS
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #ELIMINA DE LOGIN
            $query="DELETE FROM [LogAlumnos] where NoControl=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE LUGALUMNOS
            $query="DELETE FROM [LugAlumnos] where NoControl=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE LUGALUMNOS
            $query="DELETE FROM [CarreAlumnos] where NoControl=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE ALUMNOS
            $query="DELETE FROM [Alumnos] where NoControl=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);

             #Llamada a Alerta de eliminado
           
            echo"<script>alert('Estudiante eliminado con éxito')</script>";
            include_once("../PaginasVista/modifica_alumnos2.html");
            //header("location.href=modifica_alumnos2.php");
             sqlsrv_close($conexion);
        }
        catch(Exception $e){
            echo"<script>alert('No se pudo eliminar el estudiante)</script>";
            include_once("../PaginasVista/modifica_alumnos2.html");
            //header("location.href='/PaginasVista/modifica_alumnos2.php'");
        
        }
    }
}

}




$in= new Modificar_Estudiantes;
$in->modificando();
?>