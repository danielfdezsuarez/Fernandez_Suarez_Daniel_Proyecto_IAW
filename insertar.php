<?php
  session_start();
  if (isset($_SESSION["user"])) {
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR CAMISETA</title>
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
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>Login</button></a>
        <a href="logout.php"><button>Cerrar sesion</button></a>
      </header><br>
      
      <?php if (!isset($_POST["id_camiseta"])) : ?>
      
        <form action="insertar.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>CAMISETA</legend>
            <span>ID_Camiseta:</span><input type="number" name="id_camiseta"><br>
            <span>Jugador:</span><input type="text" name="jugador"><br>
            <span>Dorsal:</span><input type="number" name="dorsal"><br>
            <span>Marca:</span><input type="text" name="marca"><br>
            <span>Publicidad:</span><input type="text" name="publicidad"><br>
            <span>Temporada:</span><input type="text" name="temporada"><br>
            <span>Competición:</span><input type="text" name="competicion"><br>
            <span>Observaciones:</span><input type="text" name="observaciones"><br>
            <span>Imagen:</span><input type="file" name="imagen"><br><br>
                <fieldset>
                    <legend>EQUIPO</legend>
                    <span>Equipo:</span><select name="cod_equipo" required><br>
                        <?php
                          $connection = new mysqli("localhost", "root", "123456", "camisetas");
                          if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                         }
                         $result = $connection->query("SELECT id_equipo,nombre FROM equipo");
                         if ($result) {
                           while ($obj=$result->fetch_object()) {
                              $valor = $obj->id_equipo;
                              echo "<option  value='$valor'>";                              
                              echo $obj->nombre;
                              echo "</option>";
                           }
                         } else {
                           printf("Query failed: %s\n", $connection->connect_error);
                           exit();
                         }
                        ?>
                        </select>
                </fieldset>
	        <br><span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
            
      <?php else: ?>      
            
      <?php
        $tmp_file = $_FILES['imagen']['tmp_name'];
        $target_dir = "img/";
        $target_file = strtolower($target_dir . basename($_FILES['imagen']['name']));
        $valid= true;
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $valid = false;
        }
        //Check the size of the file. Up to 2Mb
        if ($_FILES['imagen']['size'] > (2048000)) {
                $valid = false;
                echo 'Oops!  Your file\'s size is to large.';
            }
        //Check the file extension: We need an image not any other different type of file
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION); // We get the entension
        if ($file_extension!="jpg" && $file_extension!="jpeg" && $file_extension!="png" && $file_extension!="gif") {
          $valid = false;
          echo "Only JPG, JPEG, PNG & GIF files are allowed";
        }
        if ($valid) {
          //Put the file in its place
          move_uploaded_file($tmp_file, $target_file);
          echo "PRODUCT ADDED";
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          
          $connection->set_charset("uft8");
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //INSERTING THE NEW PRODUCT
          $id_camiseta=$_POST['id_camiseta'];
          $jugador=$_POST['jugador'];
          $dorsal=$_POST['dorsal'];
          $marca=$_POST['marca'];
          $publicidad=$_POST['publicidad'];
          $temporada=$_POST['temporada'];
          $competicion=$_POST['competicion'];
          $observaciones=$_POST['observaciones'];
            
          $cod_equipo=$_POST['cod_equipo'];
            
            
          $query="INSERT INTO camiseta VALUES('', $jugador', '$dorsal', '$marca', '$publicidad', '$temporada', '$competicion', '$target_file', '$observaciones')";
          echo $query;
           if ($result = $connection->query($query)) {
          
          } else {
           echo "Fallo insert camiseta";
           exit();
          }
            
          $query2="INSERT INTO camiseta_equipo VALUES('', '$cod_equipo')";
          echo $query2;
           if ($result = $connection->query($query2)) {
          
          } else {
           echo "Fallo insert camiseta_equipo";
           exit();
          }
        }
      ?>

      <?php endif ?>      
            
  </body>
</html>