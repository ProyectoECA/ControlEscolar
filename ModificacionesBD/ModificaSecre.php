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
        
        $in=new Modifica_Sec;

        if(isset($_POST['modifica'])){
            #MODIFICA EN TABLA SECRETARIAS
            try{
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
                    
                    #Llamada a Alerta de modificacion
                    $ban=true;
                    $in->alerts($ban);
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
                    
                    #Llamada a Alerta de modificado
                    $ban=true;
                    $in->alerts($ban);
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

                sqlsrv_close($conexion);
            }
            catch(Exception $e){
                #Llamada a Alerta de error
                $ban=false;
                $in->alerts($ban);
            }
        }
        else if(isset($_POST['elimina'])){
            #ELIMINA SECRETARIAS
            try{
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
                 $ban=true;
                 $in->alerts($ban);
            }
            catch(Exception $e){
                #Llamada a Alerta de error
                $ban=false;
                $in->alerts($ban);
            }
        }
    }

    function alerts($ban){
        #Alertas (necesitan html a fuerzas)
        ?>
        <html>
        <body>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        #Si hay error
        if($ban==false){
            ?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'No se pudieron modificar/eliminar los datos',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed) {
                location.href='../PaginasVista/modificar_secretarias.html';
            }
            else{
                location.href='../PaginasVista/modificar_secretarias.html';
            }
            window.history.back('/PaginasVista/jefe_Control.html');})
            </script>
        <?php }
        #Si agrega con éxito
        if($ban==true){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: 'MODIFICACIÓN EXITOSA',
            text: 'Secretaria modificada/eliminada con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='../PaginasVista/modificar_secretarias.html';
            }
            else{
                location.href='../PaginasVista/modificar_secretarias.html';
            }
            window.history.back('/PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
        ?>
        
        <?php
    }
}

$mod=new Modifica_Sec;
$mod->modificando();
?>