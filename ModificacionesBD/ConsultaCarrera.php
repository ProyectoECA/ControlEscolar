<?php

class Consultas_Carre{
    function consultando(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo); 


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