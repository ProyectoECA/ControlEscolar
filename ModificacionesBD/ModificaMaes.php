<?php


define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');

class Modificar_Maestros {

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
        $rfc = $_POST["rfc"]; 
        $titulo = $_POST["titulo"]; 
        $correo = $_POST["correo"]; 

        $in= new Modificar_Maestros;

        if(isset($_POST['modifica'])){

        #MODIFICA EN TABLA MAESTROS
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
            #MOFICA RELACIÓN DE MAESTRO Y LUGAR
            $query="UPDATE LugMaestros SET cp= ? WHERE ClaveMa =?";
            $parametros=array($cp,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            #MODIFICA TODOS LOS ATRIBUTOS DE TABLA MAESTROS
            $query="UPDATE Maestros SET Nombre=? where ClaveMa=?";
            $parametros=array($nombre,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            

            $query="UPDATE Maestros SET ApePaterno= ? WHERE ClaveMa = ?";
            $parametros=array($apePaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET ApeMaterno= ? WHERE ClaveMa = ?";
            $parametros=array($apeMaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET RFC= ? WHERE ClaveMa = ?";
            $parametros=array($rfc,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Titulo= ? WHERE ClaveMa = ?";
            $parametros=array($titulo,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Telefono= ? WHERE ClaveMa = ?";
            $parametros=array($telefono,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Correo= ? WHERE ClaveMa = ?";
            $parametros=array($correo,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Calle= ? WHERE ClaveMa = ?";
            $parametros=array($calle,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Colonia= ? WHERE ClaveMa = ?";
            $parametros=array($colonia,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            
            #Lama alerta de Modificación con exito
            
            echo"<script>alert('Maestr@ modificado con éxito');
            location.href='/PaginasVista/modificar_maestros.html'</script>";
            sqlsrv_close($conexion);
        }
    else if(isset($_POST['elimina'])){
        #ELIMINA MAESTROS
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #ELIMINA DE LOGIN
            $query="DELETE FROM [LogMaestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE LUGMAESTROS
            $query="DELETE FROM [LugMaestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE MAESTROS
            $query="DELETE FROM [Maestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);

             #Llamada a Alerta de eliminado
             echo"<script>alert('Maestr@ eliminado con éxito');
             location.href='/PaginasVista/modificar_maestros.html'</script>";
             sqlsrv_close($conexion);
        }
    }
}

$in= new Modificar_Maestros;
$in->modificando();
?>