<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Registra_Unidad{
    function registrando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        if($cone){
            $id=$_POST["clave"];
            $uni=$_POST["unidad"];
            $tema=$_POST["tema"];
            $sub=$_POST["subtema"];

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName, $connectionInfo);
            //echo $id.$uni.$tema.$sub;
            
            #COMPRUEBA QUE EL NUMERO DE UNIDAD QUE INTENA REGISTRAR NO EXCEDA LOS DE LA MATERIA
            $query="SELECT Unidades FROM Materias WHERE ClaveMat=?";
            $parametros=array($id);
            $datos=sqlsrv_query($conexion,$query,$parametros);
            $ban=0;
            while($row = sqlsrv_fetch_array($datos)){
               
                $unidad=$row["Unidades"];
                echo "uni". $uni;
                 echo "uni2". $unidad;
                if($uni>($unidad)){
                    $ban=1;
                }
                else if($uni==$unidad){
                    $ban=2;
                }
            }
            
            #COMPRUEBA QUE ESA UNIDAD NO SE ENCUENTRE CAPTURADA
            $query="SELECT NoUni FROM CaptuUnidades WHERE ClaveMat=?";
            $parametros=array($id);
            $datos2=sqlsrv_query($conexion,$query,$parametros);
            echo "checando";
            var_dump($datos2);
            while($row = sqlsrv_fetch_array($datos2)){
                $unidad=$row["NoUni"];
                if($uni==$unidad){
                    $ban=2;
                }
            }
            if($ban==1){
                echo"<script>alert('Esta unidad no existe en la materia');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
            }
            else if($ban==2){
                echo"<script>alert('Esta unidad ya se encuentra registrada');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
            }
            else{
                #COMPRUEBA CUANTAS CARRERAS LLEVAN LA MATERIA, INSERTA EN LA TABLA CAPTUUNIDADES
                $query= "SELECT ClaveCa from CarreMaterias where ClaveMat=?";
                $parametros=array($id);
                $resp=$cone->Buscar($query,$parametros);
                for($i=0;$i<count($resp);$i++){
                    $claveCa=$resp[$i]['ClaveCa'];
                    $query="INSERT INTO [CaptuUnidades] (ClaveMat,NoUni,TemaUni,Subtemas,ClaveCa) VALUES (?,?,?,?,?)";
                    $parametros=array($id,$uni,$tema,$sub,$claveCa);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);
                    
                    #INICIALIZA LA TABLA FECHASEVA
                    $val='';
                    $query="INSERT INTO [FechasEva] (ClaveMat,NoUniE,ClaveCa,ProI,ProT,RealI,RealT,EvaI,EvaT) VALUES (?,?,?,?,?,?,?,?,?)";
                    $parametros=array($id,$uni,$claveCa,$val,$val,$val,$val,$val,$val);
                    $cone->Insertar_Eliminar_Actualizar($query,$parametros);

                    }
                
                echo"<script>alert('Unidad capturada con éxito');
                            location.href='/PaginasVista/captura_Unidades.php'</script>";
            }
        }
        else{
            echo"<script>alert('No se puede establecer una conexión');
                        location.href='/PaginasVista/captura_Unidades.php'</script>";
        }
    }
}


$reg=new Registra_Unidad;
$reg->registrando();