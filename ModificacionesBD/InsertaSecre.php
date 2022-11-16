<?php
include_once "../CRUD/Usuarios_password.php";
include_once "../CRUD/CRUD_bd_SQLServer.php";
define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');

class Insertar_Secretaria{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        if($cone){
        #RECEPCIÓN DE DATOS
        $no_empleado=$_POST["numeroEmple"];
        $nombre=$_POST["nombre"];
        $ape_Pat=$_POST["apellidoP"];
        $ape_Mat=$_POST["apellidoM"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $estado=$_POST["estado"];
        $codPos=$_POST["cp"];
        $telefono=$_POST["tel"];
        $email=$_POST["correo"];

        /*if(isset($_POST['guarda_sec'])){*/
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO SECRETARIA
            $query="SELECT * FROM [Secretarias] where IdSec=?";
            $parametros=array($no_empleado);
            $res=$cone->Buscar($query,$parametros);
            
            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO MAESTROS
            $query="SELECT * FROM [Maestros] where ClaveMa=?";
            $parametros=array($no_empleado);
            $res1=$cone->Buscar($query,$parametros);

            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO ADMINISTRADOR
            $query="SELECT * FROM [AdmCor] where UsuaAdm=?";
            $parametros=array($no_empleado);
            $res2=$cone->Buscar($query,$parametros);
            $cone->CerrarConexion();

            if((empty($res))and (empty($res1))and (empty($res2))){
                #INSERTA EN TABLA SECRETARIAS
                    $query="INSERT INTO [Secretarias] (IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia) VALUES (?,?,?,?,?,?,?,?)";
                    $parametros=array($no_empleado,$nombre,$ape_Pat,$ape_Mat,$telefono,$email,$calle,$colonia);
                    $stmt = sqlsrv_query($conexion, $query, $parametros);

                    $query="SELECT * FROM [Lugar] where cp=?";
                    $parametros=array($codPos);
                    $stmt = sqlsrv_query($conexion, $query, $parametros);
                    $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

                    #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
                    if(empty($datos)){
                        $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                        $parametros=array($codPos, $municipio, $estado);
                        $stmt= sqlsrv_query($conexion,$query, $parametros);

                        $query="INSERT INTO [LugSecretarias] (IdSec,CP) VALUES (?,?)";
                        $parametros=array($no_empleado,$codPos);
                        $stmt=sqlsrv_query($conexion,$query,$parametros);
                        #$resul=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
                        $conexion_pass->CerrarConexion();
                        echo"<script>alert('Secretari@ registrado con éxito (Recuerda que el usuario y la contraseña es el RH con mayúsculas)');
                        location.href='/PaginasVista/secretarias.html'</script>";
                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query="INSERT INTO [LugSecretarias] (IdSec,CP) VALUES (?,?)";
                        $parametros=array($no_empleado,$codPos);
                        $stmt=sqlsrv_query($conexion,$query,$parametros);

                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
                        $conexion_pass->CerrarConexion();
                        echo"<script>alert('Secretari@ registrado con éxito (Recuerda que el usuario y la contraseña es el RH con mayúsculas)');
                        location.href='/PaginasVista/secretarias.html'</script>";
                    }
                    sqlsrv_close($conexion);
            }
            else{
                echo"<script>alert('Ya existe un usuario registrado con este RH');
                        location.href='/PaginasVista/secretarias.html'</script>";
            }
   
    }
    else{
        echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/secretarias.html'</script>";
    }
    }

}
$in=new Insertar_Secretaria;
$in->insertando();
?>
</body>
</html>