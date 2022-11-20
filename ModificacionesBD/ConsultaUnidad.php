<?php

class Consultas_Unidad{
    function consultando(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT * from CaptuUnidades";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT *from CaptuUnidades WHERE ClaveMat like '%".$q."%' OR NoUni like '%".$q."%' 
            OR TemaUni like '%".$q."%' OR Subtemas like '%".$q."%' ORDER BY ClaveMat";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
                   <th>Clave</th>
                   <th>Unidad</th>
                   <th>Tema</th>
                   <th>Subtema</th>
               </tr>
            </thead>
            <tbody>";
            while( $row = sqlsrv_fetch_array($res)){
                $clave=$row['ClaveMat'];
                $nouni=$row['NoUni'];
                $tema=$row['TemaUni'];
                $sub=$row['Subtemas'];

                $salida.=
                "<tr>
                    <th>$clave</th>
                    <th>$nouni</th>
                    <th>$tema</th>
                    <th>$sub</th>
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

$con=new Consultas_Unidad;
$con->consultando();
?>