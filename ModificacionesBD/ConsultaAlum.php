<?php

class Consultas_Alumnos{
    function consultando(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT Alumnos.NoControl,Alumnos.Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo,CarreAlumnos.Semestre, Carreras.NombreCarre
        FROM [Alumnos],[LugAlumnos],[Lugar],[CarreAlumnos],[Carreras] where (Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP and
        Alumnos.NoControl=CarreAlumnos.NoControl and CarreAlumnos.ClaveCa=Carreras.ClaveCa)";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT Alumnos.NoControl,Alumnos.Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo,CarreAlumnos.Semestre, NombreCarre
                FROM [Alumnos],[LugAlumnos],[Lugar],[CarreAlumnos],[Carreras] where 
                (Alumnos.Nombre like '%".$q."%' OR Alumnos.NoControl like '%".$q."%' OR ApePaterno like '%".$q."%' OR ApeMaterno like '%".$q."%' 
                OR Municipio like '%".$q."%' OR Estado like '%".$q."%' OR Lugar.CP like '%".$q."%' or Correo like '%".$q."%' OR
                CarreAlumnos.Semestre like '%".$q."%' OR NombreCarre like '%".$q."%')
                and (Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP and 
                Alumnos.NoControl=CarreAlumnos.NoControl and CarreAlumnos.ClaveCa=Carreras.ClaveCa)";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
                   <th>Número de control</th>
                   <th>Nombre</th>
                   <th>Apellido paterno</th>
                   <th>Apellido materno</th>
                   <th>Calle y número</th>
                   <th>Colonia</th>
                   <th>Municipio</th>
                   <th>Estado</th>
                   <th>Código postal</th>
                   <th>Teléfono</th>
                   <th>Nombre padre o tutor</th>
                   <th>Teléfono padre o tutor</th>
                   <th>Correo</th>
                   <th>Carrera</th>
                   <th>Semestre</th>
               </tr>
            </thead>
            <tbody>";
            while( $row = sqlsrv_fetch_array($res)){
                $noCon=$row['NoControl'];
                $nom=$row['Nombre'];
                $ap=$row['ApePaterno'];
                $am=$row['ApeMaterno'];
                $calle=$row['Calle'];
                $colonia=$row['Colonia'];
                $muni=$row['Municipio'];
                $est=$row['Estado'];
                $cp=$row['CP'];
                $tel=$row['Telefono'];
                $nomTut=$row['NomTutor'];
                $telTut=$row['TelTutor'];
                $email=$row['Correo'];
                $sem=$row['Semestre'];
                $carre=$row['NombreCarre'];

                $salida.=
                "<tr>
                    <th>$noCon</th> 
                    <th>$nom</th> 
                    <th>$ap</th> 
                    <th>$am</th> 
                    <th>$calle</th> 
                    <th>$colonia</th> 
                    <th>$muni</th> 
                    <th>$est</th> 
                    <th>$cp</th> 
                    <th>$tel</th> 
                    <th>$nomTut</th> 
                    <th>$telTut</th> 
                    <th>$email</th> 
                    <th>$sem</th>
                    <th>$carre</th>
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

$con=new Consultas_Alumnos;
$con->consultando();
?>
