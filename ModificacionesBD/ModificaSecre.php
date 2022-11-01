<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Modifica_Sec{
    
    function modificando(){
        #RECEPCION DE DATOS
        $no_empleado=$_POST["clave2"];
        $nom=$_POST["nombre"];
        $apeP=$_POST["apellidoP"];
        $apeM=$_POST["apellidoM"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $estado=$_POST["estado"];
        $codPos=$_POST["cp"];
        $tel=$_POST["tel"];
        $correo=$_POST["correo"];
        

        if(isset($_POST['modifica'])){
            #MODIFICA EN TABLA SECRETARIAS
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

                $query="SELECT * FROM [Lugar] where cp=?";
                $parametros=array($codPos);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

                #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
                if(empty($datos)){
                    $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                    $parametros=array($codPos, $municipio, $estado);
                    $stmt= sqlsrv_query($conexion,$query, $parametros);
                }
                #SI EL CP YA ESTA REGISTRADO
                else{
                    #ACTUALIZA CP,ESTADO Y MUNICIPIO
                    $query="UPDATE Lugar SET Municipio=? where CP=?";
                    $parametros=array($municipio,$codPos);
                    $stmt=sqlsrv_query($conexion,$query,$parametros);
                    $query="UPDATE Lugar SET Estado=? where CP=?";
                    $parametros=array($estado,$codPos);
                    $stmt=sqlsrv_query($conexion,$query,$parametros);
                    
                }
                #MODIFICA RELACION SECRE-LUGAR
                $query="UPDATE LugSecretarias SET CP=? where IdSec=?";
                $parametros=array($codPos,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);

                #MODIFICA DATOS GENERALES DE SECRE
                $query="UPDATE Secretarias SET Nombre=? where IdSec=?";
                $parametros=array($nom,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET ApePaterno=? where IdSec=?";
                $parametros=array($apeP,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET ApeMaterno=? where IdSec=?";
                $parametros=array($apeM,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET Telefono=? where IdSec=?";
                $parametros=array($tel,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET Correo=? where IdSec=?";
                $parametros=array($correo,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET Calle=? where IdSec=?";
                $parametros=array($calle,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Secretarias SET Colonia=? where IdSec=?";
                $parametros=array($colonia,$no_empleado);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                
                echo"<script>alert('Secretari@ modifIcado con éxito');
                location.href='/PaginasVista/modificar_maestros.html'</script>";

                sqlsrv_close($conexion);
        }
        else if(isset($_POST['elimina'])){
            #ELIMINA SECRETARIAS
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

                #ELIMINA DE LOGIN
                $query="DELETE FROM [LogSecretarias] where IdSec=?";
                $parametros=array($no_empleado);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                #ELIMINA DE LUGSECRETARIA
                $query="DELETE FROM [LugSecretarias] where IdSec=?";
                $parametros=array($no_empleado);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                #ELIMINA DE SECRETARIAS
                $query="DELETE FROM [Secretarias] where IdSec=?";
                $parametros=array($no_empleado);
                $stmt = sqlsrv_query($conexion, $query, $parametros);

                 #Llamada a Alerta de eliminado
                 echo"<script>alert('Secretari@ eliminado con éxito');
                        location.href='/PaginasVista/modificar_secretarias.html'</script>";
            
        }
    }

}

$mod=new Modifica_Sec;
$mod->modificando();
?>