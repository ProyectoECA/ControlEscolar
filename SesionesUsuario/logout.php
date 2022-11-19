<?php
    include_once 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    //elimina la ruta anterior para dirigirnos a la ruta que tiene el index.php
    header_remove("http://https://controlescolarweb.azurewebsites.net/sesionesUsuario/logout.php");
    header("Location: https://controlescolarweb.azurewebsites.net");
    exit;    

    //pastear
?>