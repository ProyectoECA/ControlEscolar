<?php
session_start();


$nombre = "";
if(isset($_SESSION['user'])){

    $nombre = $_SESSION['user'][2];


}

$data = ["nombre"=>$nombre];
header("Content-Type: application/json");
echo json_encode($data);

?>