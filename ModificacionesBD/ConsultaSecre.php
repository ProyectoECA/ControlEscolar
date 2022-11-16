<?php
define("ServerName1", 'controlescolarservidor.database.windows.net');
define("Database1", "ConEscolarBD");
define("UID1", "nochistlanadm");
define("PWD1", "Sok03951");
define("CharacterSet1", 'UTF-8');
class Consultas_Secre{
    function consultando(){

        $connectionInfo=array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $con = sqlsrv_connect(ServerName1, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT Secretarias.IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
        FROM [Secretarias],[LugSecretarias],[Lugar] where (Secretarias.IdSec=LugSecretarias.IdSec and LugSecretarias.CP=Lugar.CP)";
        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT Secretarias.IdSec,Nombre,ApePaterno,ApeMaterno,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
            FROM [Secretarias],[LugSecretarias],[Lugar] where (Secretarias.IdSec=LugSecretarias.IdSec and LugSecretarias.CP=Lugar.CP) AND
                (Secretarias.IdSec like '%".$q."%' OR Nombre like '%".$q."%' OR ApePaterno like '%".$q."%' OR ApeMaterno like '%".$q."%'  
                OR Municipio like '%".$q."%' OR Estado like '%".$q."%' OR Lugar.CP like '%".$q."%' OR Correo like '%".$q."%')
                ORDER BY Secretarias.IdSec";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
               <th>No.empleado </th>
               <th>Nombre </th>
               <th>Apellido paterno </th>
               <th>Apellido materno </th>
               <th>Calle y número </th>
               <th>Colonia</th>
               <th>Municipio</th>
               <th>Estado</th>
               <th>Código postal</th>
               <th>Teléfono </th>
               <th>Correo</th>
               </tr>
            </thead>
            <tbody>";
            while( $row = sqlsrv_fetch_array($res)){
                $clav=$row['IdSec'];
                $nom=$row['Nombre'];
                $ap=$row['ApePaterno'];
                $am=$row['ApeMaterno'];
                $calle=$row['Calle'];
                $colonia=$row['Colonia'];
                $muni=$row['Municipio'];
                $est=$row['Estado'];
                $cp=$row['CP'];
                $tel=$row['Telefono'];
                $email=$row['Correo'];

                $salida.=
                "<tr>
                    <th>$clav</th> 
                    <th>$nom</th> 
                    <th>$ap</th> 
                    <th>$am</th> 
                    <th>$calle</th> 
                    <th>$colonia</th> 
                    <th>$muni</th> 
                    <th>$est</th> 
                    <th>$cp</th> 
                    <th>$tel</th> 
                    <th>$email</th>
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

$con=new Consultas_Secre;
$con->consultando();
?>