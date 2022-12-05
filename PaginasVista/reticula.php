<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RETICULA</title> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon"> 
    <link rel="stylesheet" href="/css/estilos_reticula.css">
    <style>
        #tabla {
            width: 20%;
            border-collapse: collapse;
            table-layout: fixed;
            word-wrap: break-word;
            font-size: 15px;
            float: left;
            
        }
        #ta {
            vertical-align: top;
            height: 50px;
            table-layout: fixed;
            float: left;
            word-wrap: break-word;
        }
        #tab {
            word-wrap: break-word;
            margin: 5px;
            float: left;
            table-layout: fixed;
        }
    </style>
</head>
<body>
    <div class="logo" style="float: left;">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="70%">   
    </div>  

    <div class="nombre" style="float: center;"> 
        <div class="tituloP" style="float: left;">
            <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
        </div> 
    </div>
    <div class="datos" style="float: center;">
        <select class="input" type="text" placeholder="CARRERA" name="">&nbsp;&nbsp;
        <input class="btnBuscar" type="submit" value="BUSCAR">&nbsp;&nbsp;
        <input class="btnSalir" type="button" value="CANCELAR" onclick="location.href = 'http://localhost/index.php' ">&nbsp;&nbsp;
    </div> 
    <div class="contenedor-general">  


    <?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');
$connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
$con=sqlsrv_connect(ServerName1, $connectionInfo);

$query = "SELECT * FROM Materias";
$stmt= sqlsrv_query($con,$query);

$l=1;

$i=1;
$i1=1;
$i2=1;
$i3=1;
$i4=1;
$i5=1;
$i6=1;
$i7=1;
$i8=1;
$i9=1;
$i10=1;

$r="";
$r1="";
$r2="";
$r3="";
$r4="";
$r5="";
$r6="";
$r7="";
$r8="";
$r9="";

$t="";
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    if($row['semestre']==1){
        $i=$i1;
        $l=1;
    }
    else if($row['semestre']==2){
        $i=$i2;
        $l=2;
    }
    else if($row['semestre']==3){
        $i=$i3;
        $l=3;
    }
    elseif($row['semestre']==4){
        $i=$i4;
        $l=4;
    }
    else if($row['semestre']==5){
        $i=$i5;
        $l=5;
    }
    else if($row['semestre']==6){
        $i=$i6;
        $l=6;
    }
    else if($row['semestre']==7){
        $i=$i7;
        $l=7;
    }
    else if($row['semestre']==8){
        $i=$i8;
        $l=8;
    }
    else if($row['semestre']==9){
        $i=$i9;
        $l=9;
    }
    else if($row['semestre']==10){
        $i=$i10;
        $l=10;
    }
    $t="";
    $t.="
    <style>
    #tar {
        /* posicionar hasta arriba */
        vertical-align: top;
        /* definir el height y mantenerlo constante y no dejar que se modifique por el texto*/
        height: 50px;
        table-layout: fixed;
        /* posicionar tabla hasta arriba */
     
        /* transform: translateY(-40%);  */
        /* definir espacio de arriba predeterminado*/
        margin-top: 0px;
        float: left;
    }
    </style>
    <table align='center' border='1' width='130' height='0' id='tar'>
     <tr>
     <th width='20'>".$l."<br>"
    . $i ."</th>
    <th width='95'>" . $row['Nombre'] ."<br>"
    . $row['ClaveMat'] ."<br>"
    . $row['Creditos']."</th>"." </tr>
    </table>";
    if ($row['semestre']==1) {
        $r.=$t;
        $i1=$i1+1;
    }
    else if($row['semestre']==2){
        $r1.=$t;
        $i2=$i2+1;
    }
    else if($row['semestre']==3){
        $r2.=$t;
        $i3=$i3+1;
    }
    else if($row['semestre']==4){
        $r3.=$t;
        $i4=$i4+1;
    }
    else if($row['semestre']==5){
        $r4.=$t;
        $i5=$i5+1;
    }
    else if($row['semestre']==6){
        $r5.=$t;
        $i6=$i6+1;
    }
    else if($row['semestre']==7){
        $r6.=$t;
        $i7=$i7+1;
    }
    else if($row['semestre']==8){
        $r7.=$t;
        $i8=$i8+1;
    }
    else if($row['semestre']==9){
        $r8.=$t;
        $i9=$i9+1;
    }
    else if($row['semestre']==10){
        $r9.=$t;
        $i10=$i10+1;
    }
}
sqlsrv_free_stmt($stmt);
sqlsrv_close($con);
?>


<div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r;
                    ?>
                </td>
                </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r1;
                    ?>
                </td>
                </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r2;
                    ?>
                </td>
            </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r3;
                    ?>
                </td>
            </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r4;
                    ?>
                </td>
            </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r5;
                    ?>
                </td>
            </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r6;
                    ?>
                </td>
            </tr>
            </div>
            <div>
            <table border="1"  width="130.5" height="0" id="tab">
            <tr>
                <td width="130.5" height="100">
                    <?php
                    echo $r7;
                    ?>
                </td>
            </tr>
            </div>
            
            
    </div>
</body>
</html>

 <!-- <h2>RETÍCULA</h2> -->
        <!--<div class="sem" style="float: left;">
       
        </div> 
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">

        </div>
        <div class="sem" style="float: left;">-->

        <!-- </div>
        
    </div> -->