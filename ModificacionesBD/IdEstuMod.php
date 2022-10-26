<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class saca_IDEstu{
    function agrega_idEstu(){
        $id = $_POST["clave1"];
        $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
        $query="SELECT NoControl FROM [Alumnos] where NoControl=?";
        $parametros=array($id);
        $stmt = sqlsrv_query($conexion, $query, $parametros);
        $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);?>
        <?php
        if(empty($datos)){
            echo"<script>alert('No existe el estudiante')</script>";
                
                //location.href='PaginasVista/modifica_alumnos2.php'</script>"
            include_once("../PaginasVista/modifica_alumnos2.html");
        }
        else{
            $query="SELECT Alumnos.NoControl,Alumnos.Nombre,ApePaterno,ApeMaterno,NombreCarre,CarreAlumnos.Semestre,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP,NomTutor,TelTutor
                FROM [Alumnos],[LugAlumnos],[Lugar],[Carreras],[CarreAlumnos] where (Alumnos.NoControl=? and Alumnos.NoControl=LugAlumnos.NoControl 
                and LugAlumnos.CP=Lugar.CP and Alumnos.NoControl=CarreAlumnos.NoControl and Carreras.ClaveCa=CarreAlumnos.ClaveCa )";
            $parametros=array($id);
            $stmt2 = sqlsrv_query($conexion, $query, $parametros);
            $row=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC);
            include_once("ConsultaModiEstu.php");

        }
    }


}

$id=new saca_IDEstu;
$id->agrega_idEstu();
?>


