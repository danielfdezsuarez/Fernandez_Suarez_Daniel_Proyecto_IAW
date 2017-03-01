<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
        }
      img {
        max-height: 900px;
        max-width: 900px;  
        }
      .boton {
        background-color: sandybrown;
        color: white;
        }
      
    </style>
  </head>
  <body>
      
      
      <?php if (!isset($_POST["id_equipo"])) : ?>

        <?php 
        $cod=isset($_GET['id_equipo']) ? $_GET['id_equipo'] : null;
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
           
        var_dump($cod);
        echo "<br>";
      var_dump($_POST);    
        
      
      ?>

      <?php else: ?>
    
      <?php endif ?>

  </body>
</html>