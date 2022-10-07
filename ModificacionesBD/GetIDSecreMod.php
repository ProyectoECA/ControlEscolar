
<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Saca_ID{
    function agrega_id(){
        $id=$_POST["noEmpl"];
        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
        $query="SELECT IdSec FROM [Secretarias] where IdSec=?";
        $parametros=array($id);
        $stmt = sqlsrv_query($conexion, $query, $parametros);
        $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);?>

        <?php
        if(empty($datos)){?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Datos inexistentes',
                    confirmButtonText: 'Aceptar',
                    timer:5000,
                    timerProgressBar:true,
                    })
                    window.history.back('../PaginasVista/jefe_Control.html');
                </script>
        <?php
        include_once("../PaginasVista/modificar_secretarias.html");
        }
        else{
            $query="SELECT Secretarias.IdSec,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Lugar.CP,Municipio,Estado,Telefono,Correo
            FROM [Secretarias],[LugSecretarias],[Lugar]
            where (Secretarias.IdSec=? and Secretarias.IdSec=LugSecretarias.IdSec and LugSecretarias.CP=Lugar.CP)";
            $parametros=array($id);
            $stmt2 = sqlsrv_query($conexion, $query, $parametros);
            $row=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC);
            include_once("ConsultaModiSecre.php");

        }
    }
}
$id=new Saca_ID;
$id->agrega_id();
?>