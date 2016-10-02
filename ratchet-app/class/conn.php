<?php

    $user = "basews02";
    $pwd = "JG8@7uLio89";
    $bdd = "basews02";
    $conn;
    $respuesta;

    $mysqli = new mysqli("basews02.db.8917278.hostedresource.com", $user, $pwd, $bdd);
    
    if(mysqli_connect_error()){
        echo "Conexion fallida: ", mysqli_connect_error();
        exit();
    }
?>