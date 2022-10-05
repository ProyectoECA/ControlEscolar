<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos_login.css"> 
    <title>Login</title>
    <style type="text/css">
        #correctousuario {
            display: none;
        }

        #incorrectousuario {
            display: none;
        }

        #correctopass {
            display: none;
        }

        #incorrectopass {
            display: none;
        }
    </style>
</head>
<body>
    <div class="login-container">
       
        <div class="login-info-container">
            <div class="social-login">
                <div class="image">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="90%" >
                </div>
            </div>
            <!-- codigo php -->
                <?php
                    if(isset($errorLogin)){
                        echo "<p class=''>" . $errorLogin ."</p>";
                    }
                ?>
            <!--  ######################  -->
            <form class="inputs-container" action="" method="POST">
                <input class="input" type="text"  name="username" placeholder="Usuario" id="usuario">
                <div>
                    <font size="2">
                    <p size="8" id="correctousuario">usuario valido</p>
                    <p size="8" id="incorrectousuario">el username no puede llevar ñ, espacios, etcetera; debe contener la clave<br>
                    institucional (ejemplo:RH123 o TECNM1234567899)</p>
                    </font>
                </div>
                <input class="input" type="password" name="password" placeholder="Contraseña" id="contraseña">
                <div>
                <font size="2">
                    <p id="correctopass">contraseña valida</p>
                    <p id="incorrectopass">la contraseña no puede llevar ñ y espacios, <br>
                    por lo menos debe contener un simbolo, una mayuscula, una minuscula y un numero,<br>
                    con una longitud de 8-16 caracteres</p>
                </font>
                </div>
                <!--<input  class="btn" type="submit" value="COMPROBAR">-->
                <button class="btn" onclick='verifica()' type="submit" name="registrar" value="submit">CONTINUAR</button> 
                <!--<a class="btn" href="jefe_Control.html">COMPROBAR</a> -->
                <a href="">Olvidaste tu Contraseña</a>
            </form>
           
        </div>
    </div>
    <script src="verificacion.js"></script>
</body>
</html>