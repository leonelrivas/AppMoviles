<<?php
session_start();
require('../class/conn.php');

if(!isset($_SESSION['id'])){
    header("location: ../");
}
else{
    $sql = "Select * from categoria";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    
    if($rows > 0){
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
    <script src="../ratchet-2.0.2/dist/js/ratchet.js"></script>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Ecomputer</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
      <p class="content-padded">
        Nuestras categorias:
      </p>
      <ul class="table-view">
         <?php while($r = $result->fetch_array(MYSQLI_ASSOC)){ ?>
          <li class="table-view-cell">
            <a class="navigate-right" href="detalle_cat.php?cat=<?php echo $r['idcategoria']; ?>">
                <?php echo $r['categoria']; ?>
            </a>
          </li>
          <?php }} ?>
      </ul>
    </div>
    <nav class="bar bar-tab">
      <a class="tab-item active" href="#">
        <span class="icon icon-home"></span>
        <span class="tab-label">Inicio</span>
      </a>
      <a class="tab-item" href="#">
        <span class="icon icon-person"></span>
        <span class="tab-label">Yo</span>
      </a>
      <a class="tab-item" href="../ecomputer/categorias.php">
        <span class="icon icon-list"></span>
        <span class="tab-label">Categorias</span>
      </a>
      <a class="tab-item" href="../ecomputer/carrito.php">
        <span class="icon icon-compose"></span>
        <span class="tab-label">Carrito</span>
      </a>
    </nav>
  </body>
  <?php } ?>
</html>