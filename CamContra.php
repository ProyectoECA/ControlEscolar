<html>
<body>
<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Cambio_Password  {

    function cambiaP_Jefe(){
        $archivo= fopen("Archivo.txt","r") or die("Problema al abrir el archivo");
        $user=fgets($archivo);
        fclose($archivo);
  
        $pass =$_POST["contra1"];
        $pass1 = $_POST["contra2"];

        $con=new Cambio_Password;

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
            $ban=true;
            $con->alerts($ban);

        }
        else{
            $ban=false;
            $con->alerts($ban);
        }
        
    }

    function alerts($ban){
        #Alertas (necesitan html a fuerzas)
        ?>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        #Si agrega con éxito
        if($ban==true){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: 'MODIFICACIÓN EXITOSA',
            text: 'La contraseña se ha modificado con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='/PaginasVista/jefe_Control.html';
            }
            else{
                location.href='/PaginasVista/jefe_Control.html';
            }
            window.history.back('/PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
        else{?>
            <script>
            Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: 'Las contraseñas no coinciden',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='/PaginasVista/jefe_Control.html';
            }
            else{
                location.href='/PaginasVista/jefe_Control.html';
            }
            window.history.back('/PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
    }
}


$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>