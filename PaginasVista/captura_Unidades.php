<?php
define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');
$connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
$conexion=sqlsrv_connect(ServerName1, $connectionInfo);

$query="SELECT ClaveMat FROM Materias";
$resultado= sqlsrv_query($conexion,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIDADES</title> 
    <link rel="stylesheet" href="/css/estilos_captura_unidades.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
    <script languaje="javascript" src="../PaginasVista/script/jquery-3.6.1.min.js"></script>
    <script languaje="javascript">
		$(document).ready(function() {
			$("#clave").change(function() {
				$("#clave option:selected").each(function() {
					Id = $(this).val();
					$.post("../PaginasVista/getNombreMat.php", {
						Id: Id
					}, function(data) {
						$("#nombre").html(data);
					});
				});
			})
		});
	</script>
    <!--Para el nombre de la materia
     <script lenguaje="javascript">
      $(document).ready(function(){
        $("#clave").change(function(){
          $("#clave option:selected").each(function(){
            Id=$(this).val();
            $.post("../PaginasVista/getNombreMat.php",{
              Id:Id
            }, function(data){
              $("#nombre").html(data);
            });
          });
        })
      });
     </script>-->
</head>
<body>
    <div class="logo" style="float: left;">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
    </div>  

    <div class="nombre" style="float: center;"> 
        <div class="tituloP" style="float: left;">
            <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
        </div>  
    </div>
    <div class="contenedor-principal">
        <h2>CAPTURA DE UNIDADES</h2> 
        <div class="datos">
            <label class="etiquetas" style="float: center;"><b>Clave materia</b></label> 
            <select class="combobox" id="clave" name="clave">
            <?php
                while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)){?>
                <option value="<?php echo $row['ClaveMat'];?>"><?php echo $row['ClaveMat'];?></option>
            <?php }
            ?>
            </select>
            <label class="etiquetas"><b>Nombre materia</b></label> 
            <input class="cajas_texto" type="text"id="nombre" name="nombre" placeholder="" readonly>
            <label class="etiquetas"><b>Número de unidad</b></label>  
            <select class="combobox" id="unidad" name="unidad"> 
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <label class="etiquetas"  style="float: center;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tema</b></label>
            <input class="cajas_texto" type="text" placeholder="Tema">
            <label class="etiquetas" style="float: center;"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtemas</b></label> 
            <textarea class="textarea" cols="45" rows="8"></textarea>
            <input class="btnGuardar" type="submit" value="GUARDAR">
            <input class="btnCancelar" type="button" value="CANCELAR">
        </div>
    </div>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>