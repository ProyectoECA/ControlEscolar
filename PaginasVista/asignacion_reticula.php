<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta carreras</title>
    <link rel="stylesheet" href="/css/estilo_asignacion_reticula.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- <script src="script/consulUnidad.js"></script> -->
<body>
    <div class="contenedor_titulo_2">
        <h1 class="titulo_de_tec"><b>TECNOLÓGICO DE NOCHISTLÁN</b></h1>
      </div>
      <div class="Contenedor_titulo">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
      </div>
      <div class="Contenedor_ubicacion">
           <h2 class="ubicacion">ASIGNACIÓN RETICULA</h2>
      </div>
      <form method="POST" action="/PaginasVista/jerarquia.php">
        <div class="datos" style="float: center;">
          <input class="input_busqueda" type="text" placeholder="Inserta dato" name="dato" id="dato">
          <input class="btnBuscar" type="button" value="CANCELAR" onclick="location.href='http://localhost/index.php'">
          <input class="boton_confirmar" type="submit" value="BUSCAR ">
        </div> 
        </form>
    <div class="contenedor-tabla">
        <div class="table" name="tablaUni" id="tablaUni">

        <script>
        $('.boton_confirmar').click(function(){
            $.ajax({
                type:'POST',
                url:'/PaginasVista/jerarquia.php',
                data:{dato:$('#dato').val()},
                success:function(html){
                    $('#tablaUni').html(html);
                }
            });
        });
        </script>
        
        
 
 

        </div>

    </div>  
  
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>