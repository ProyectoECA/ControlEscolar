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
                try{
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

                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->alerts($ban);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
                        $conexion_pass->CerrarConexion();

                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query= "INSERT INTO [LugMaestros] (ClaveMa,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $stmt= sqlsrv_query($conexion,$query, $parametros);

                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->alerts($ban);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioMaestro($clave, $clave);
                        $conexion_pass->CerrarConexion();
                        
                    }
                    sqlsrv_close($conexion);
                }
                catch(Exception $e){
                    $ban=false;
                }
            }
            else{
                $ban=false;
                $in->alerts($ban);
                #echo "YA SE ENCUENTRA REGISTRADA ESA CLAVE";
            }
            
        }
    else if(isset($_POST['cancela_sec'])){
        try{include_once "../PaginasVista/jefe_Control.html";
        }
        catch(Exception $e){
            $ban=false;
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
            text: 'No se pudieron agregar los datos',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed) {
                location.href='../PaginasVista/maestros_datos_per.html';
            }
            else{
                location.href='../PaginasVista/maestros_datos_per.html';
            }
            window.history.back('../PaginasVista/jefe_Control.html');})
            </script>
        <?php }
        #Si agrega con éxito
        if($ban==true){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: 'REGISTRO EXITOSO',
            text: 'Maestro/a añadido con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='../PaginasVista/maestros_datos_per.html';
            }
            else{
                location.href='../PaginasVista/maestros_datos_per.html';
            }
            window.history.back('../PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
        ?>
        </body>
        </html>
        <?php
    }
}
$in= new Insertar_Maestros;
$in->insertando();
?>