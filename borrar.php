<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
      <?php
      
      if (!isset($_GET['id'])) {
          echo "No client selected";
      } else {
          $cliente=$_GET['id'];
          
      $connection=new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      ?>

      <?php
          $consulta="DELETE FROM camiseta_equipo WHERE id_camiseta=".$_GET['id'];
          $consulta2="DELETE FROM camiseta WHERE id_camiseta=".$_GET['id'];
          
          $result=mysqli_query($connection,$consulta);
          $result2=mysqli_query($connection,$consulta2);
          
          if($result==false){
              echo "Error consulta";
          } else {
              echo "Borrado correctamente";
          }
      }
      ?>
      
  </body>
</html>