<?php

include_once '../CRUD/Usuarios_password.php';
include_once "../CRUD/CRUD_bd_SQLServer.php";

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');


class Insertar_Estu{
    function insertando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $conexion_pass = new User_password;
        $conexion_pass->conexionBD();

        if($cone){

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);

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
            $carrera = $_POST["selecion_carrera"]; 
            $semestre = $_POST["selecion_semestre"]; 
 
        #if(isset($_POST['guardar'])){
            #COMPRUEBA QUE EL ID NO ESTE REGISTRADO
            $query="SELECT * FROM [Alumnos] where NoControl=?";
            $parametros=array($clave);
            $res=$cone->Buscar($query,$parametros);

            if(empty($res)){
                #INSERTA EN TABLA ALUMNOS
                
                    $query= "INSERT INTO [Alumnos] (NoControl,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia,NomTutor,TelTutor) 
                    VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$telefono,$correo,$calle,$colonia,$tutor,$teltutor);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                    
                    #Consultar la clave de la carrera
                    #$query="SELECT * FROM [Carreras] where NombreCarre=?";
                    #$parametros=array($carrera);
                    #$carre=$cone->Buscar($query,$parametros);
                    #$carre1=$carre[0][0];
                    #$carre1=strval($carre1);

                    #Agrega a CarreAlumnos
                    $query= "INSERT INTO [CarreAlumnos] (NoControl, ClaveCa, Semestre) VALUES (?,?,?)";
                    $parametros=array($clave, $carrera, $semestre);
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

                        #Asigna a los estudiantes las materias correspondientes al semestre
                        $query1="SELECT ClaveMat  FROM [Materias] where Carrera=?";
                        $parametros1=array($carrera);
                        $resultado= sqlsrv_query($conexion,$query1,$parametros1);
        
                        while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
                            $rep="P";

                            $mat=$row["ClaveMat"];

                            $query= "INSERT INTO [AlumMate] (NoControl,ClaveMat,rep) VALUES (?,?,?)";
                            $parametros=array($clave,$mat,$rep);
                            $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                        }

                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioAlumno($clave, $clave);
                        $conexion_pass->CerrarConexion();

                        #Llamada a Alerta de registrado
                        echo"<script>alert('Estudiante registrado con éxito (Recuerda que el usuario y la contraseña es el TNM con mayúsculas)');
                        location.href='/PaginasVista/alumnos_datos.php'</script>";
                          
                    }
                    #SI EL CP YA ESTA REGISTRADO
                    else{
                        $query= "INSERT INTO [LugAlumnos] (NoControl,CP) VALUES (?,?)";
                        $parametros=array($clave,$cp);
                        $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                        #Asigna a los estudiantes las materias correspondientes al semestre
                        $query1="SELECT ClaveMat  FROM [Materias] where Carrera=?";
                        $parametros1=array($carrera);
                        $resultado= sqlsrv_query($conexion,$query1,$parametros1);
        
                        while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){
                            $rep="P";

                            $mat=$row["ClaveMat"];

                            $query= "INSERT INTO [AlumMate] (NoControl,ClaveMat,rep) VALUES (?,?,?)";
                            $parametros=array($clave,$mat,$rep);
                            $cone->Insertar_Eliminar_Actualizar($query,$parametros); 
                        }

                        #Agrega contraseña en hash
                        $conexion_pass->InsertarUsuarioAlumno($clave, $clave);
                        $conexion_pass->CerrarConexion();

                        #Llamada a Alerta de registrado
                        echo"<script>alert('Estudiante registrado con éxito (Recuerda que el usuario y la contraseña es el TNM con mayúsculas)');
                        location.href='/PaginasVista/alumnos_datos.php'</script>";
                      
                    }
                    $cone->CerrarConexion();
                    sqlsrv_close($conexion);

                   
            }
            else{
                echo"<script>alert('El número de control ya se encuentra registrado');
                location.href='/PaginasVista/alumnos_datos.php'</script>";
               
            }
        
            }
        
        else{
            echo"<script>alert('No se pudo establecer una conexión');
            location.href='/PaginasVista/alumnos_datos.php'</script>";
            
        }
    } 
    
    
}
$in= new Insertar_Estu;
$in->insertando();
?>

