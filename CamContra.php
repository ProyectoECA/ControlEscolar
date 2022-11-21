<html>
<body>
<?php
include_once "SesionesUsuario/user_session.php";



define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');
class Cambio_Password  {

    function cambiaP_Jefe(){
        $archivo= fopen("Archivo.txt","r") or die("Problema al abrir el archivo");
        $user=fgets($archivo);
        fclose($archivo);
  
        $pass =$_POST["contra1"];
        $pass1 = $_POST["contra2"];

        $con=new Cambio_Password;
        $sesion = new UserSession();
        
        $nivel=$sesion->getUserNivel();

        if ($nivel==1){
            if($pass=="" or $pass1==""){?>
                <script>
                location.href='/PaginasVista/jefe_Control.html';
                </script>
            <?php
            }
            else if($pass==$pass1){
                
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
    
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
                
                $query="UPDATE [LogAdmin] SET PassAdm=? where UsuaAdm=?";
                $parametros=array($password_hash,$user);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
        
                sqlsrv_close($conexion);
               
                $_SESSION['user'][3] = false;
                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
                //onclick="location.href ='http://localhost/index.php'";
                //include_once("/PaginasVista/jefe_Control.php");
           
    
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
               
            }

        }
        else if($nivel==2){
            if($pass=="" or $pass1==""){?>
                <script>
                location.href='/PaginasVista/principal_secretarias.php';
                </script>
            <?php
            }
            else if($pass==$pass1){
                
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
    
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
                
                $query="UPDATE [LogSecretarias] SET PassSec=? where IdSec=?";
                $parametros=array($password_hash,$user);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
            
                sqlsrv_close($conexion);
              
                $_SESSION['user'][3] = false;

                echo"<script>alert('Contraseña modificada con éxito');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
              
            
    
            }
            else{
                echo"<script>alert('No se pudo modificar la contraseña');
                location.href='https://controlescolarweb.azurewebsites.net'</script>";
           
                
            }

        }

        
        
    }

}
$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>