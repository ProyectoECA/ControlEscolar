<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Modifica_Estu{
    
    function modificando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        #RECEPCION DE DATOS
        $control=$_POST["clave2"];
        $nom=$_POST["nombre"];
        $apeP=$_POST["apePat"];
        $apeM=$_POST["apeMat"];
        $calle=$_POST["calle"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $estado=$_POST["estado"];
        $codPos=$_POST["cp"];
        $tel=$_POST["tel"];
        $correo=$_POST["correo"];
        $nomTutor=$_POST["nomTutor"];
        $telTutor=$_POST["telTutor"];
        $carrera=$_POST["carrera"];
        $semestre=$_POST["semestre"];

        $in=new Modifica_Estu;

        if(isset($_POST['modifica'])){
            #MODIFICA EN TABLA ALUMNOS
            try{
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName, $connectionInfo);

                $query="SELECT * FROM [Lugar] where cp=?";
                $parametros=array($codPos);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                $datos=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);

                #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
                if(empty($datos)){
                    $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                    $parametros=array($codPos, $municipio, $estado);
                    $stmt= sqlsrv_query($conexion,$query, $parametros);
                    
                    #Llamada a Alerta de modificacion
                    $ban=true;
                    $in->alerts($ban);
                }
                #SI EL CP YA ESTA REGISTRADO
                else{
                    #ACTUALIZA CP,ESTADO Y MUNICIPIO
                    $query="UPDATE Lugar SET Municipio=? where CP=?";
                    $parametros=array($municipio,$codPos);
                    $stmt=sqlsrv_query($conexion,$query,$parametros);
                    $query="UPDATE Lugar SET Estado=? where CP=?";
                    $parametros=array($estado,$codPos);
                    $stmt=sqlsrv_query($conexion,$query,$parametros);
                    
                    #Llamada a Alerta de modificado
                    $ban=true;
                    $in->alerts($ban);
                }
                #MODIFICA RELACION ALUMNO-LUGAR
                $query="UPDATE LugAlumnos SET CP=? where NoControl=?";
                $parametros=array($codPos,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);

                #MODIFICA RELACION ALUMNO-CARRERA
                $query="SELECT * FROM [Carreras] where Nombre=?";
                    $parametros=array($carrera);
                    $carre=$cone->Buscar($query,$parametros);
                    $carre1=$carre[0][0];
                    $carre1=strval($carre1);

                $query="UPDATE CarreAlumnos SET ClaveCa=? where NoControl=?";
                $parametros=array($carre1);
                $stmt=sqlsrv_query($conexion,$query,$parametros);

                $query="UPDATE CarreAlumnos SET Semestre=? where NoControl=?";
                $parametros=array($semestre);
                $stmt=sqlsrv_query($conexion,$query,$parametros);


                #MODIFICA DATOS GENERALES DE ALUMNOS
                $query="UPDATE Alumnos SET Nombre=? where NoControl=?";
                $parametros=array($nom,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET ApePaterno=? where NoControl=?";
                $parametros=array($apeP,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET ApeMaterno=? where NoControl=?";
                $parametros=array($apeM,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET Telefono=? where NoControl=?";
                $parametros=array($tel,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET Correo=? where NoControl=?";
                $parametros=array($correo,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET Calle=? where NoControl=?";
                $parametros=array($calle,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET Colonia=? where NoControl=?";
                $parametros=array($colonia,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET NomTutor=? where NoControl=?";
                $parametros=array($nomTutor,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
                $query="UPDATE Alumnos SET TelTutor=? where NoControl=?";
                $parametros=array($telTutor,$control);
                $stmt=sqlsrv_query($conexion,$query,$parametros);
               
                sqlsrv_close($conexion);
            }
            catch(Exception $e){
                #Llamada a Alerta de error
                $ban=false;
                $in->alerts($ban);
            }
        }
        else if(isset($_POST['elimina'])){
            #ELIMINA SECRETARIAS
            try{
                $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
                $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

                #ELIMINA DE LOGIN
                $query="DELETE FROM [LogAlumnos] where NoControl=?";
                $parametros=array($control);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                #ELIMINA DE LUGALUMNOS
                $query="DELETE FROM [LugAlumnos] where NoControl=?";
                $parametros=array($control);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                #ELIMINA DE CARREALUMNOS
                $query="DELETE FROM [CarreAlumnos] where NoControl=?";
                $parametros=array($control);
                $stmt = sqlsrv_query($conexion, $query, $parametros);
                #ELIMINA DE ALUMNOS
                $query="DELETE FROM [Alumnos] where NoControl=?";
                $parametros=array($control);
                $stmt = sqlsrv_query($conexion, $query, $parametros);

                sqlsrv_close($conexion);

                 #Llamada a Alerta de eliminado
                 $ban=true;
                 $in->alerts($ban);
            }
            catch(Exception $e){
                #Llamada a Alerta de error
                $ban=false;
                $in->alerts($ban);
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
            text: 'No se pudieron modificar/eliminar los datos',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed) {
                location.href='../PaginasVista/modificar_alumnos.html';
            }
            else{
                location.href='../PaginasVista/modificar_alumnos.html';
            }
            window.history.back('/PaginasVista/principal_secretarias.php');})
            </script>
        <?php }
        #Si agrega con éxito
        if($ban==true){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: 'MODIFICACIÓN EXITOSA',
            text: 'Estudiante modificado/eliminado con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='../PaginasVista/modificar_alumnos.html';
            }
            else{
                location.href='../PaginasVista/modificar_alumnos.html';
            }
            window.history.back('/principal_secretarias.php');})
            </script>
        <?php
        }
        ?>
        
        <?php
    }
}

$mod=new Modifica_Estu;
$mod->modificando();
?>

?>

