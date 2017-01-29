<?php
  session_start();
  if (isset($_SESSION["user"])) {
    var_dump($_SESSION);
  } else {
    session_destroy();
    header("Location: insertar_equipo.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR EQUIPO</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
      <header>
        <a href="index.php"><button>INDEX</button></a>
        <a href="insertar.php"><button>INSERTAR CAMISETA</button></a>
        <a href="login.php"><button>Login</button></a>
        <a href="logout.php"><button>Cerrar sesion</button></a>
      </header><br>
      
      <?php if (!isset($_POST["id_equipo1"])) : ?>
      
        <form action="insertar_equipo.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EQUIPO</legend>
            <span>ID_Equipo:</span><input type="number" name="id_equipo1" required><br>
            <span>Club/Selección:</span><input type="radio" name="club_seleccion" value="Club" value="Seleccion"><input type="radio" name="club/seleccion" value="Seleccion"><br>
            <span>Nombre:</span><input type="text" name="nombre"><br>
            <span>País:</span><input type="text" name="pais"><br>
            <span>Continente:</span><input type="text" name="continente"><br>
            <span>Imagen_equipo:</span><input type="file" name="imagen_eq"><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
            
      <?php else: ?>      
            
      <?php
        $tmp_file = $_FILES['imagen_eq']['tmp_name'];
        $target_dir = "img/";
        $target_fi = strtolower($target_dir . basename($_FILES['imagen_eq']['name']));
        $valid= true;
        if (file_exists($target_fi)) {
          echo "Sorry, file already exists.";
          $valid = false;
        }
        //Check the size of the file. Up to 2Mb
        if ($_FILES['imagen_eq']['size'] > (2048000)) {
                $valid = false;
                echo 'Oops!  Your file\'s size is to large.';
            }
        //Check the file extension: We need an image not any other different type of file
        $file_extension = pathinfo($target_fi, PATHINFO_EXTENSION); // We get the entension
        if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
          $valid = false;
          echo "Only JPG, JPEG, PNG & GIF files are allowed";
        }
        if ($valid) {
          //Put the file in its place
          move_uploaded_file($tmp_file, $target_fi);
          echo "PRODUCT ADDED";
          $connection = new mysqli("localhost", "root", "123456", "camisetas");/*casa*/
          //$connection = new mysqli("localhost", "root", "2asirtriana", "camisetas");/*clase*/
          $connection->set_charset("uft8");
          //TESTING IF THE CONNECTION WAS RIGHT
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //INSERTING THE NEW PRODUCT
          
          $id_equipo1=$_POST['id_equipo1'];
          $club_seleccion=$_POST['club_seleccion'];
          $dorsal=$_POST['nombre'];
          $marca=$_POST['pais'];
          $publicidad=$_POST['continente'];
          
          $query3="INSERT INTO equipo VALUES('$id_equipo1', '$club_seleccion', '$nombre', '$pais', '$continente', '$target_fi')";
          echo $query3;
           if ($result = $connection->query($query3)) {
          
          } else {
           echo "Fallo insert equipo";
           exit();
          }
          
        }
      ?>

      <?php endif ?>      
            
  </body>
</html>