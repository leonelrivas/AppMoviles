<?php
session_start();
require('../class/conn.php');

if(!isset($_SESSION['id'])){
    header("location: ../");
}
else{
    $sql = "Select * from productos LIMIT 5";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;
    
    if($rows > 0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eComputer</title>
    
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
            <ul data-role="listview">
               <?php
                while($r = $result->fetch_array(MYSQLI_ASSOC)){
               ?>
                <li>
                    <a href="#" onclick="ira(<?php echo $r['idproducto']; ?>)">
                        <img class="media-object pull-left" src="<?php echo $r["url"]; ?>" width="45px" height="45px">
                        <h2><?php echo $r["nombre"]; ?></h2>
                        <p><?php echo $r["descripcion"]; ?></p>
                        <p>Precio: &#36; <?php echo $r["precio"]; ?></p>
                    </a>
                </li>
                <?php
                }
              }
              mysqli_free_result($result);
            }
          ?>
            </ul>
        </div>
    </div>
    <script>
        function ira(url){
            window.location.href="verproducto.php?id='"+url+"'";
        }
    </script>
</body>
</html>