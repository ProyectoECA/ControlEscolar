<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Secretaria</title>
    <link rel="stylesheet" href="/css/estilo_pagina_secretaria.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_datos_secretaria">
        <div class="secre-datos-contenedor">
            <div class="social_secretaria">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="30%" >
                </div>
            </div>
            <form  method="POST" action="/ModificacionesBD/InsertaSecre.php" class="cajas_de_texto_secretaria">
                <input class="caja_texto" type="text" placeholder="No.Empleado" name="numeroEmple" id="numeroEmple"><br>
                <input class="caja_texto" type="text" placeholder="Nombre" name="nombre" id="nombre"><br>
                <input class="caja_texto" type="text" placeholder="Apellido paterno" name="apellidoP" id="apellidoP"><br>
                <input class="caja_texto" type="text" placeholder="Apellido materno" name="apellidoM" id="apellidoM"><br>
                <input class="caja_texto" type="text" placeholder="Calle y numero" name="calle" id="calle"><br>
                <input class="caja_texto" type="text" placeholder="Colonia" name="colonia" id="colonia"><br>
                <input class="caja_texto" type="text" placeholder="Municipio" name="municipio" id="municipio"><br>
                <input class="caja_texto" type="text" placeholder="Estado" name="estado" id="estado"><br>
                <input class="caja_texto" type="int" placeholder="Codigo postal" name="cp" id="cp"><br>
                <input class="caja_texto" type="int" placeholder="No.Telefono" name="tel" id="tel"><br>
                <input class="caja_texto" type="email" placeholder="Correo" name="correo" id="correo"><br><br>
                <input type="submit" value="Guardar" name="guarda_sec" class="btn" >
                <input type="submit" value="Cancelar" name="cancela_sec" class="btn">
            </form>
        </div>
    </div>
    
</body>
</html>