<?php

include_once '../CRUD/Usuarios_password.php';
include_once "../CRUD/CRUD_bd_SQLServer.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Insertar_Maestros {

    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        #RECEPCIÓN DE DATOS
        $clave = $_POST["clave"]; 
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

        $in= new Insertar_Maestros;
        if(isset($_POST['guarda_sec'])){
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName, $connectionInfo);

            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO
            $query="SELECT * FROM [Maestros] where ClaveMa=?";
            $parametros=array($clave);
            $res=$cone->Buscar($query,$parametros);
            
            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO SECRETARIAS
            $query="SELECT * FROM [Secretarias] where IdSec=?";
            $parametros=array($clave);
            $res=$cone->Buscar($query,$parametros);

            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO ADMINISTRADOR
            $query="SELECT * FROM [AdmCor] where UsuaAdm=?";
            $parametros=array($clave);
            $res2=$cone->Buscar($query,$parametros);
            $cone->CerrarConexion();

            if((empty($res))and(empty($res1))and(empty($res2))){
                #INSERTA EN TABLA MAESTROS
                    $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                    $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

                    $query= "INSERT INTO [Maestros] (ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia) 
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$rfc,$titulo,$telefono,$correo,$calle,$colonia);
                    $stmt= sqlsrv_query($conexion,$query, $parametros);

                    $query="SELECT * FROM [Lugar] where cp=?";
                    $parametros=array($cp);
                    $stmt= sqlsrv_query($conexion,$query, $parametros);
                    $arreResul= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
                    
                    #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
                    if(empty($arreResul)){
                        $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                        $parametros=array($cp, $municipio, $estado);
                        $stmt= sqlsrv_query($conexion,$query, $parametros);

                        $query= "INSERT INTO [LugMaestros] (ClaveMa,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $stmt= sqlsrv_query($conexion,$query, $parametros);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
                        $conexion_pass->CerrarConexion();

                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query= "INSERT INTO [LugMaestros] (ClaveMa,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $stmt= sqlsrv_query($conexion,$query, $parametros);
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
                        $conexion_pass->CerrarConexion();
                        
                    }
                    echo"<script>alert('Maestr@ registrado con éxito (Recuerda que el usuario y la contraseña es el RH con mayúsculas)');
                        location.href='/PaginasVista/maestros_datos_per.html'</script>";
                    sqlsrv_close($conexion);
            }
            else{
                echo"<script>alert('Ya existe un usuario registrado con este RH');
                        location.href='/PaginasVista/maestros_datos_per.html'</script>";
            }
            
        }
    else if(isset($_POST['cancela_sec'])){
        include_once "../PaginasVista/jefe_Control.html";
    }
}
    
}
$in= new Insertar_Maestros;
$in->insertando();
?>