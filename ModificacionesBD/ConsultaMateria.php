<?php
define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');
class ConsultaMat{
    function consultando(){

        $connectionInfo=array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $con = sqlsrv_connect(ServerName1, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT * from Materias";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT * from Materias WHERE
            ClaveMat like '%".$q."%' OR Nombre like '%".$q."%' OR Carrera like '%".$q."%' ORDER BY ClaveMat";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
                   <th>Clave</th>
                   <th>Nombre</th>
                   <th>Créditos</th>
                   <th>Carrera</th>
                   <th>No. Unidades</th>
                   <th>Objetivos</th>
               </tr>
            </thead>
            <tbody>";
            while($row = sqlsrv_fetch_array($res)){
                $clave=$row['ClaveMat'];
                $nom=$row['Nombre'];
                $cred=$row['Creditos'];
                $carre=$row['Carrera'];
                $uni=$row['Unidades'];
                $obj=$row['Objetivos'];

                $salida.=
                "<tr>
                    <th>$clave</th> 
                    <th>$nom</th> 
                    <th>$cred</th> 
                    <th>$carre</th>
                    <th>$uni</th>
                    <th>$obj</th>
                </tr>";
            }
            $salida.="
            </tbody>
            </table>";
        }
        else{
            $salida="Sin coincidencias";
        }
        echo $salida;
    }
}

$con=new ConsultaMat;
$con->consultando();
?>