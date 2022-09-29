<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Maestros</title>
    <link rel="stylesheet" href="/css/estilo_datos_mestros.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_datos_maestros">
        <div class="maestros-datos-contenedor">
            <div class="social_maestros">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="30%" >
                </div>
            </div>
            <form  method="POST" action="/ModificacionesBD/InsertaMaes.php" class="cajas_de_texto_maestros" >
                <input class="caja_texto" type="text" placeholder="Clave" name="clave" id="clave"><br>
                <input class="caja_texto" type="text" placeholder="Nombre" name="nombre" id="nombre"><br>
                <input class="caja_texto" type="text" placeholder="Apellido paterno" name="apePat" id="apePat"><br>
                <input class="caja_texto" type="text" placeholder="Apellido materno" name="apeMat"  id="apeMat"><br>
                <input class="caja_texto" type="text" placeholder="Calle y número" name="calle" id="calle"><br>
                <input class="caja_texto" type="text" placeholder="Colonia"  name="colonia" id="colonia"><br>
                <input class="caja_texto" type="text" placeholder="Municipio" name="municipio" id="municipio"><br>
                <input class="caja_texto" type="text" placeholder="Estado" name="estado" id="estado"><br>
                <input class="caja_texto" type="int" placeholder="Código postal" name="cp" id="cp"><br>
                <input class="caja_texto" type="int" placeholder="No.Teléfono" name="telefono" id="telefono"><br>
                <input class="caja_texto" type="text" placeholder="RFC" name="rfc" id="rfc"><br>
                <input class="caja_texto" type="text" placeholder="Titulo" name="titulo" id="titulo"><br>
                <input class="caja_texto" type="email" placeholder="Correo" name="correo" id="correo"><br><br>
                <input type="submit" value="Guardar" name="guarda_sec" class="btn" ><br>
                <input type="submit" value="Cancelar" name="cancela_sec" class="btn">
            </form>
        </div>
    </div>

    
</body>
</html>