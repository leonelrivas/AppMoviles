<?php
session_start();
require('../class/conn.php');

if(!isset($_SESSION['id'])){
    header("location: ../");
}
else{
    if(isset($_SESSION['car'])){
        $arreglopro = $_SESSION['car'];
        $hayado = false;
        $numero = 0;
        
        for($i = 0; $i < count($arreglo); $i++){
            if($arreglopro[$i]['Id'] == $_GET['pro']){
                $hayado = true;
                $numero = $i;
            }
        }
        if($encontrado == true){
            $arreglopro[$numero]['Cantidad']=$arreglopro[$numero]['Cantidad']+1;
            $_SESSION['car'] = $arreglopro;
        }
    }
    else{
        if(isset($_GET['pro'])){
            $id = $_GET['pro'];
            $producto = "";
            $precio = 0;
            $img = "";
            
            $query = "select * from productos where idproducto = $id";
            $result = mysqli_query($query);
            while($f = mysqli_fetch_array($result)){
                $producto = $f['nombre'];
                $precio = $f['precio'];
                $img = $f['url'];
            }
            $arreglopro = array('Id'=>$id,
                               'Nombre'=>$producto,
                               'Precio'=>$precio,
                               'Imagen'=>$img,
                               'Cantidad'=>1);
            $_SESSION['car']=$arreglopro;
        }
    }
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
      <h1 class="title">Carrito de compras</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
     <?php 
        if(isset($_SESSION['car'])){
            $data = $_SESSION['car'];
            $total = 0; ?>
        <ul class="table-view">
        <?php for($i = 0; i < count($data); $i++){ ?>
          <li class="table-view-cell media">
            <a class="navigate-right">
              <img class="media-object pull-left" src="<?php echo $data[$i]['Imagen']; ?>">
                <?php echo $data[$i]['Nombre']; ?>
                <p>Cantidad: &#36;<?php echo $data[$i]['Cantidad']; ?></p>
                <p>SubTotal:&#36;<?php echo $data[$i]['Cantidad']*$data[$i]['Precio']; ?></p>
            </a>
          </li>
      <?php            
            } ?>
        </ul>
        }
        else{ ?>
        <h3 class="content-padded">El carrito esta vacio</h3>
      <?php }
      ?>
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
      <a class="tab-item" href="../ecomputer/categorias.php">
        <span class="icon icon-list"></span>
        <span class="tab-label">Categorias</span>
      </a>
      <a class="tab-item active" href="#">
        <span class="icon icon-compose"></span>
        <span class="tab-label">Carrito</span>
      </a>
    </nav>
    <?php mysqli_free_result($result);}  ?>
  </body>
</html>