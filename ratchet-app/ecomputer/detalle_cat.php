<?php
session_start();
require('../class/conn.php');

if(!isset($_SESSION['id'])){
    header("location: ../");
}
else{
    if(isset($_GET['cat'])){
        $idcat = $_GET['cat'];
        $sql = "Select * from productos where categoria_idcategoria = $idcat";
        $result = $mysqli->query($sql);
        
?>
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
    <link href="../ratchet-2.0.2/dist/css/ratchet.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="../ratchet-2.0.2/dist/js/ratchet.min.js"></script>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Productos</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
     <br>
      <ul class="table-view">
           <?php while($r = $result->fetch_array(MYSQL_ASSOC)){ ?>
           <li class="table-view-cell media">
            <a class="navigate-right" href="ver_producto.php?produc=<?php echo $r['idproductos']; ?>">
              <img class="media-object pull-left" src="<?php echo $r["url"]; ?>" width="45px" height="45px">
              <div class="media-body">
                <?php echo $r['nombre']; ?>
                <p><?php echo $r["descripcion"]; ?></p>
                <p>Precio: &#36; <?php echo $r["precio"]; ?></p>
              </div>
            </a>
          </li>
          <?php } ?>
        </ul>
    </div>
    <nav class="bar bar-tab">
      <a class="tab-item" href="../index.php">
        <span class="icon icon-home"></span>
        <span class="tab-label">Inicio</span>
      </a>
      <a class="tab-item" href="#">
        <span class="icon icon-person"></span>
        <span class="tab-label">Yo</span>
      </a>
      <a class="tab-item active" href="../ecomputer/categorias.php">
        <span class="icon icon-list"></span>
        <span class="tab-label">Categorias</span>
      </a>
      <a class="tab-item" href="#">
        <span class="icon icon-compose"></span>
        <span class="tab-label">Carrito</span>
      </a>
    </nav>
    <?php } mysqli_free_result($result);} ?>
  </body>
</html>