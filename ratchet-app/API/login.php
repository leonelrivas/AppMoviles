<?php

//intente hacer un web service aqui pero no me salio profe T.T
/*header('Content-Type: application/jason');
header("Access-Control-Allow-Origin: *");
header('Access-Control_Allow-Methods: POST, GET, OPTIONS');

$root = realpath($_SERVER["DOCUMENT_ROOT"]);*/
include("../class/conn.php");
/*
if(isset($_POST["usuario"]) && isset($POST["pwd"])){
    try{
        $user = $_POST["usuario"];
        $passwd = $_POST["pwd"];
        
        $conexion = new Conexion();
        
        $query = "Select idcliente, nombre, correo FROM cliente WHERE usuario='$user' AND pass='$passwd'";
        
        $conexion->conectar();
        $respu = $conexion->query($query);
        $numr = mysqli_num_rows($respu);
        $conexion->desconectar();
        
        if($numr == 0){
            $resultados=array("autoriza"=>"error");
            echo json_encode($resultados);
        }
        else{
            $resultados=$respu->fetch_array(MYSQL_ASSOC);
            echo json_encode($resultados);
        }
    }
    catch(MySQLException $e){
            $resultados=array("autoriza"=>"error");
            echo json_encode($resuldaos);
        }
}
else{
    $resultados=array("autoriza"=>"error");
    echo json_encode($resultados);
}*/


?>