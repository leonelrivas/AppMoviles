<?php
session_start();
require('../class/conn.php');

if(!isset($_SESSION['id'])){
    header("location: ../");
}
else{
    if(isset($_GET['id'])){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Producto eComputer</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    
    <!-- incluyendo archivos para ejecutar jquery mobile -->
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
    <!-- contenedor princiapl de jquery mobile -->
    <div data-role="page">
        <div data-role="header">
            <h1>Ecomputer</h1>
        </div>
        <div data-role="content">
            <div>
                <p>Hola</p>
            </div>
        </div>
        <div data-role="footer" style="text-align:center;">
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Carrito</a>
            <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Categorias</a>
        </div>
    </div>
</body>
</html>