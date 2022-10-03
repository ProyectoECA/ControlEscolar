<?php


define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Modificar_Maestros {

    function modificando(){

        #RECEPCIÓN DE DATOS
        $clave = $_POST["clave2"]; 
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

        $in= new Modificar_Maestros;

        if(isset($_POST['modifica'])){

        #MODIFICA EN TABLA MAESTROS
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #VERIFICA SI EL CODIGO POSTAL YA ESTA
            $query="SELECT * FROM [Lugar] where cp=?";
            $parametros=array($cp);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            $arreResul= sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            
            #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
            if(empty($arreResul)){
                $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                $parametros=array($cp, $municipio, $estado);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                
                $ban=true;
            
                $in->alerts($ban);
            }
            #SI EL CP YA ESTA REGISTRADO, SOLO MODIFICA MUNICIPIO Y/O ESTADO
            else{
                $query="UPDATE Lugar SET Municipio= ? WHERE cp = ?";
                $parametros=array($municipio,$cp);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                $query="UPDATE Lugar SET Estado= ? WHERE cp = ?";
                $parametros=array($estado,$cp);
                $stmt= sqlsrv_query($conexion,$query, $parametros);
                
                $ban=true;
            
                $in->Alerts($ban);
            }
            #MOFICA RELACIÓN DE MAESTRO Y LUGAR
            $query="UPDATE LugMaestros SET cp= ? WHERE ClaveMa =?";
            $parametros=array($cp,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            #MODIFICA TODOS LOS ATRIBUTOS DE TABLA MAESTROS
            $query="UPDATE Maestros SET Nombre=? where ClaveMa=?";
            $parametros=array($nombre,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            

            $query="UPDATE Maestros SET ApePaterno= ? WHERE ClaveMa = ?";
            $parametros=array($apePaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET ApeMaterno= ? WHERE ClaveMa = ?";
            $parametros=array($apeMaterno,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET RFC= ? WHERE ClaveMa = ?";
            $parametros=array($rfc,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Titulo= ? WHERE ClaveMa = ?";
            $parametros=array($titulo,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Telefono= ? WHERE ClaveMa = ?";
            $parametros=array($telefono,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Correo= ? WHERE ClaveMa = ?";
            $parametros=array($correo,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Calle= ? WHERE ClaveMa = ?";
            $parametros=array($calle,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);

            $query="UPDATE Maestros SET Colonia= ? WHERE ClaveMa = ?";
            $parametros=array($colonia,$clave);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
            
            #Lama alerta de Modificación con exito
            
             
            sqlsrv_close($conexion);
        }
        catch(Exception $e){
            $ban=false;
        }
    }
    else if(isset($_POST['elimina'])){
        #ELIMINA MAESTROS
        try{
            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

            #ELIMINA DE LOGIN
            $query="DELETE FROM [LogMaestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE LUGMAESTROS
            $query="DELETE FROM [LugMaestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);
            #ELIMINA DE MAESTROS
            $query="DELETE FROM [Maestros] where ClaveMa=?";
            $parametros=array($clave);
            $stmt = sqlsrv_query($conexion, $query, $parametros);

             #Llamada a Alerta de eliminado
             $ban=true;
             $in->alerts($ban);
             sqlsrv_close($conexion);
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
            location.href='../PaginasVista/modificar_maestros.html';
        }
        else{
            location.href='../PaginasVista/modificar_maestros.html';
        }
        window.history.back('/PaginasVista/jefe_Control.html');})
        </script>
    <?php }
    #Si agrega con éxito
    if($ban==true){
        ?>
        <script>
        Swal.fire({
        icon: 'success',
        title: 'MODIFICACIÓN EXITOSA',
        text: 'Maestro modificado/eliminado con éxito',
        confirmButtonText: 'Aceptar',
        timer:5000,
        timerProgressBar:true,
        }).then((result) => {
        if (result.isConfirmed){
            location.href='../PaginasVista/modificar_maestros.html';
        }
        else{
            location.href='../PaginasVista/modificar_maestros.html';
        }
        window.history.back('/PaginasVista/jefe_Control.html');})
        </script>
    <?php
    }
    ?>
    
    <?php
}
}



$in= new Modificar_Maestros;
$in->modificando();
?>