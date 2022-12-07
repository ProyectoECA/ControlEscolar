<?php
include_once "SesionesUsuario/user_session.php";

define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');

class Cambio_Password  {

    function cambia_Contrasena(){
        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

        $pass =$_POST["contra1"];
        $pass1 = $_POST["contra2"];

        $con=new Cambio_Password;
        $sesion = new UserSession();
        
        $nivel=$sesion->getUserNivel();
        $usuario=$sesion->getUser();

        if ($nivel==1){
            if($pass=="" or $pass1==""){?>
                <script>
                    location.href='https://controlescolarweb.azurewebsites.net';
                </script>
            <?php
            }
            else if($pass==$pass1){
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $query="UPDATE [LogAdmin] SET PassAdm=? where UsuaAdm=?";
                $parametros=array($password_hash,$usuario);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
               
                $_SESSION['user'][3] = false;
                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
            }
        }
        else if($nivel==2){
            if($pass=="" or $pass1==""){?>
                <script>
                    location.href='https://controlescolarweb.azurewebsites.net';
                </script>
            <?php
            }
            else if($pass==$pass1){
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $query="UPDATE [LogSecretarias] SET PassSec=? where IdSec=?";
                $parametros=array($password_hash,$usuario);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
            
                $_SESSION['user'][3] = false;
                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
              
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
            }
        }
        else if($nivel==3){
            if($pass=="" or $pass1==""){?>
                <script>
                    location.href='https://controlescolarweb.azurewebsites.net';
                </script>
            <?php
            }
            else if($pass==$pass1){
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $query="UPDATE [LogMaestros] SET PassMa=? where ClaveMa=?";
                $parametros=array($password_hash,$usuario);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                $_SESSION['user'][3] = false;

                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
              
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
            }
        }
        else if($nivel==4){
            if($pass=="" or $pass1==""){?>
                <script>
                    location.href='https://controlescolarweb.azurewebsites.net';
                </script>
            <?php
            }
            else if($pass==$pass1){
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                
                $query="UPDATE [LogAlumnos] SET PassAlu=? where NoControl=?";
                $parametros=array($password_hash,$usuario);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
            
                $_SESSION['user'][3] = false;

                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
              
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
            }
        }
        
        sqlsrv_close($conexion);

    }

}
$con=new Cambio_Password;
$con->cambia_Contrasena();
?>