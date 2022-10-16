<?php
include_once "../CRUD/Usuarios_password.php";
include_once "../CRUD/CRUD_bd_SQLServer.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Insertar_Secretaria{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

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

        $in=new Insertar_Secretaria;
        if(isset($_POST['guarda_sec'])){
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName, $connectionInfo);

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
                try{
                    


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
                        
                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->alerts($ban);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
                        $conexion_pass->CerrarConexion();
                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query="INSERT INTO [LugSecretarias] (IdSec,CP) VALUES (?,?)";
                        $parametros=array($no_empleado,$codPos);
                        $stmt=sqlsrv_query($conexion,$query,$parametros);
                        
                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->Alerts($ban);

                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioSecretaria($no_empleado, $no_empleado);
                        $conexion_pass->CerrarConexion();
                    }
                    sqlsrv_close($conexion);
                }
                catch(Exception $e){
                    #Llamada a Alerta de error
                    $ban=false;
                    $in->alerts($ban);
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
                location.href='../PaginasVista/secretarias.html';
            }
            else{
                location.href='../PaginasVista/secretarias.html';
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
            text: 'Secretaria/o añadida con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='../PaginasVista/secretarias.html';
            }
            else{
                location.href='../PaginasVista/secretarias.html';
            }
            window.history.back('../PaginasVista/jefe_Control.html');})
            </script>
        <?php
        }
        ?>
        <?php
    }

}
$in=new Insertar_Secretaria;
$in->insertando();
?>
</body>
</html>