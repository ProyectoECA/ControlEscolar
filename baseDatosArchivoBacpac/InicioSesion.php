<?php

class Sesion{
    function verifica(){
        //$usuario=$_POST["Usua"];
        //$password=$_POST["Contra"];
        $usuario='RH001';
        $password='RH001';

        //$serverName='localhost';
        $serverName='DESKTOP-J1AR91P';
        $connectionInfo = array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con=sqlsrv_connect($serverName, $connectionInfo);
        $sql="SELECT UsuaAdm,PassAdm FROM LogAdmin";
        $consul=sqlsrv_query($con,$sql);
        
        if($consul==false){
            die(print_r(sqlsrv_errors(),true));
        }

        $arre_us=array();
        $arre_cont=array();
        $x=0;
        while($row=sqlsrv_fetch_array($consul,SQLSRV_FETCH_ASSOC)){
            $arre_us[$x]=strval($row['UsuaAdm']);
            $arre_cont[$x]=strval($row['PassAdm']);
            $x++;
        }
        
        $lon=count($arre_us);
        for($i=0;$i<$lon;$i++){
            if($arre_us[$i]==$usuario and $arre_cont[$i]==$password){
                echo "si";
                //include '../PaginasDesign/jefe_Control.php';
            }
            else{
                echo "no";
            }
        }
        sqlsrv_free_stmt($consul);
    }
}
$se= new Sesion();
$se->verifica();
?>