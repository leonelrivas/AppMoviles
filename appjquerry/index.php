<?php
require('class\conn.php');
session_start();

if(!empty($_POST)){
    $usuario = mysqli_real_escape_string($mysqli, $_POST['usuario']);
    $contra = mysqli_real_escape_string($mysqli, $_POST['passwd']);
    $error = '';
    
    $sql = "SELECT idcliente, nombre, correo FROM cliente WHERE usuario='$usuario' AND pass='$contra'";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    
    if($rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['idcliente'];
        $_SESSION['name'] = $row['nombre'];
        header("location: ecomputer/index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login eComputer</title>
    
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
            <h1>Login</h1>
        </div>
        <div data-role="content">
            <form class="content-padded" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                  <input type="text" id="usuario" name="usuario" placeholder="usuario">
                  <input type="password" id="passwd" name="passwd" placeholder="Search">
                  <input type="submit" class="btn btn-primary btn-block" value="Ingresar" name="Login">
             </form>
             <p class="content-padded"><?php echo isset($error) ? utf8_decode($error) : ''; ?></p>
        </div>
    </div>
</body>
</html>