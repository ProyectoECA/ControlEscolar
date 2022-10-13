<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR ALUMNOS</title> 
    <link rel="stylesheet" href="/css/estilos_modificar_alumnos.css"> 
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    
        <div class="logo" style="float: left;">
            <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
        </div>  

        <div class="nombre" style="float: center;"> 
            <div class="tituloP" style="float: left;">
                <h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
            </div> 
            <div class="contenedor_der" style="float: right;">
                <div class="mostrar_usuario" style="float: center;"> 
                    <div class="imagen" style="float: left;">
                        <img src="/css/imagenes/Usuario.png" alt="" width="89%">
                    </div>  
                    <div class="texto" style="float: center;">
                        <h3>Aqui Estefania</h3>
                    </div>
                </div> 
            </div>
        </div> 
        <div class="titulo1">
            <h2>MODIFICAR DATOS DE ALUMNOS</h2>
        </div> 
        <form  method="POST" action="/ModificacionesBD/IdEstuMod.php" >
        <div class="datos" style="float: center;">
            <input class="input" type="text" placeholder="No. control" name="clave1">&nbsp;&nbsp;
            <input class="btnBuscar" type="submit" value="BUSCAR"  onclick="location.href = '/ModificacionesBD/IdEstuMod.php' ">&nbsp;&nbsp;
            <input class="btnSalir" type="button" value="CANCELAR" onclick="location.href = '/PaginasVista/principal_secretarias.php' ">&nbsp;&nbsp;
        </div>
        </form>
        <div class="contenedor_generalDatos">  
        <form action="">
            <input class="parte1" type="text" placeholder="No. control">
            <input class="parte1" type="text" placeholder="Nombre(s)">
            <input class="parte1" type="text" placeholder="Ap. paterno">
            <input class="parte1" type="text" placeholder="Ap. materno">
            
            <input class="parte2" type="text" placeholder="Calle y número">
            <input class="parte2" type="text" placeholder="Colonia">
            <input class="parte2" type="text" placeholder="Municipio">
            <input class="parte2" type="text" placeholder="Estado"> 

            <input class="parte3" type="text" placeholder="Codigo postal">
            <input class="parte3" type="text" placeholder="No. teléfono">
            <input class="parte3" type="text" placeholder="Correo"> 

            <input class="parte4" type="text" placeholder="Nombre completo del padre o tutor">
            <input class="parte4" type="text" placeholder="Teléfono del padre o tutor">
        </div> 
        <div class="contenedor-botones" style="float: center;">
            <input class="botones" type="submit" name="modifica" value="EDITAR">
            <input class="botones" type="submit" name="elimina" value="ELIMINAR">
        </div>
    </form>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>