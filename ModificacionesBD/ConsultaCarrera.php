<?php

class Consultas_Carre{
    function consultando(){
        define("ServerName1", 'controlescolarservidor.database.windows.net');
        define("Database1", "ConEscolarBD");
        define("UID1", "nochistlanadm");
        define("PWD1", "Sok03951");
        define("CharacterSet1", 'UTF-8');
        $connectionInfo=array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
        $con = sqlsrv_connect(GlobalServerName1, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT ClaveCa, NombreCarre, Semestre from Carreras";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT ClaveCa, NombreCarre, Semestre from Carreras WHERE
            ClaveCa like '%".$q."%' OR NombreCarre like '%".$q."%' OR Semestre like '%".$q."%' ORDER BY ClaveCa";
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
                   <th>Cantidad de semestres</th>
               </tr>
            </thead>
            <tbody>";
            while( $row = sqlsrv_fetch_array($res)){
                $clave=$row['ClaveCa'];
                $nom=$row['NombreCarre'];
                $sem=$row['Semestre'];

                $salida.=
                "<tr>
                    <th>$clave</th> 
                    <th>$nom</th> 
                    <th>$sem</th> 
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

$con=new Consultas_Carre;
$con->consultando();
?>