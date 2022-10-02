<?php
include_once "../CRUD/Usuarios_password.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Insertar_Secretaria{
    function insertando(){
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

        #INSERTA EN TABLA SECRETARIAS
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName, $connectionInfo);
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
                $resul=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
                
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
            title: 'AGREGACIÓN EXITOSA',
            text: 'Secretaria añadida con éxito',
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