<?php

include_once '../CRUD/Usuarios_password.php';
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Insertar_Estu{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        $clave = $_POST["numerocontrol"]; 
        $nombre = $_POST["nombre"]; 
        $apePaterno = $_POST["apellidoP"]; 
        $apeMaterno = $_POST["apellidoM"]; 
        $calle = $_POST["calle"]; 
        $colonia = $_POST["colonia"]; 
        $municipio = $_POST["municipio"]; 
        $estado = $_POST["estado"]; 
        $cp = $_POST["cp"]; 
        $telefono = $_POST["tel"]; 
        $tutor = $_POST["tutor"]; 
        $teltutor = $_POST["teltutor"]; 
        $correo = $_POST["correo"]; 
        $carrera = $_POST["carrera"]; 
        $semestre = $_POST["semestre"]; 

        $in= new Insertar_Estu;
        
        if(isset($_POST['guardar'])){
            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO
            $query="SELECT * FROM [Alumnos] where NoControl=?";
            $parametros=array($clave);
            $res=$cone->Buscar($query,$parametros);
            

            if(empty($res)){
                #INSERTA EN TABLA ALUMNOS
                try{
                    $query= "INSERT INTO [Alumnos] (NoControl,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia,NomTutor,TelTutor) 
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$telefono,$correo,$calle,$colonia,$tutor,$teltutor);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                    
                    #Consultar la clave de la carrera
                    $query="SELECT * FROM [Carreras] where Nombre=?";
                    $parametros=array($carrera);
                    $carre=$cone->Buscar($query,$parametros);
                    $carre1=$carre[0][0];
                    $carre1=strval($carre1);

                    #Agrega a CarreAlumnos
                    $query= "INSERT INTO [CarreAlumnos] (NoControl, ClaveCa, Semestre) VALUES (?,?,?)";
                    $parametros=array($clave, $carre1, $semestre);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                    $query="SELECT * FROM [Lugar] where cp=?";
                    $parametros=array($cp);
                    $datos=$cone->Buscar($query,$parametros);
                    
                    #SI EL CP NO ESTA REGISTRADO AÚN LO AÑADE
                    if(empty($datos)){
                        $query= "INSERT INTO [Lugar] (CP, Municipio, Estado) VALUES (?,?,?)";
                        $parametros=array($cp, $municipio, $estado);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                        $query= "INSERT INTO [LugAlumnos] (NoControl,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->alerts($ban);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioAlumno($clave, $clave);
                        $conexion_pass->CerrarConexion();
                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query= "INSERT INTO [LugAlumnos] (NoControl,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                        #Llamada a Alerta de registrado
                        $ban=true;
                        $in->alerts($ban);
                        
                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioAlumno($clave, $clave);
                        $conexion_pass->CerrarConexion();
                        
                    }
                    $cone->CerrarConexion();
                   
                }
                catch(Exception $e){
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
        
        else if(isset($_POST['cancela'])){
            try{include_once "../PaginasVista/principal_secretarias.php";
            }
            catch(Exception $e){
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
            text: 'No se pudieron agregar los datos',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed) {
                location.href='../PaginasVista/alumnosdatos.html';
            }
            else{
                location.href='../PaginasVista/alumnos_datos.html';
            }
            window.history.back('../PaginasVista/principal_secretarias.php');})
            </script>
        <?php }
        #Si agrega con éxito
        if($ban==true){
            ?>
            <script>
            Swal.fire({
            icon: 'success',
            title: 'AGREGACIÓN EXITOSA',
            text: 'Estudiante añadido con éxito',
            confirmButtonText: 'Aceptar',
            timer:5000,
            timerProgressBar:true,
            }).then((result) => {
            if (result.isConfirmed){
                location.href='../PaginasVista/alumnos_datos.html';
            }
            else{
                location.href='../PaginasVista/alumnos_datos.html';
            }
            window.history.back('../PaginasVista/principal_secretarias.php');})
            </script>
        <?php
        }
        ?>
        </body>
        </html>
        <?php
    }
}
$in= new Insertar_Estu;
$in->insertando();
?>

