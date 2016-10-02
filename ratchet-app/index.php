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
<html>
  <head>
    <meta charset="utf-8">
    <title>eComputer</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="ratchet-2.0.2/dist/css/ratchet.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="ratchet-2.0.2/dist/js/ratchet.js"></script>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Login</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
      <form class="content-padded" method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
          <input type="text" id="usuario" name="usuario" placeholder="usuario">
          <input type="password" id="passwd" name="passwd" placeholder="Search">
          <input type="submit" class="btn btn-primary btn-block" value="Ingresar" name="Login">
      </form>
      <p class="content-padded"><?php echo isset($error) ? utf8_decode($error) : ''; ?></p>
    </div>

  </body>
</html>