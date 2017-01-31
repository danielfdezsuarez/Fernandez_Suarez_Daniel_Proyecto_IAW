<?php
  session_start();
  if (isset($_SESSION["user"])) {
<<<<<<< HEAD
    echo 'Estás registrado como: '.$_SESSION['user'];
  } else {
    session_destroy();
    header("Location: login.php");
=======
    var_dump($_SESSION);
  } else {
    session_destroy();
    header("Location: insertar.php");
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
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
      
      <?php if (!isset($_POST["id_camiseta1"])) : ?>
      
        <form action="insertar.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>CAMISETA</legend>
            <span>ID_Camiseta:</span><input type="number" name="id_camiseta1" required><br>
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
<<<<<<< HEAD
                          $connection = new mysqli("localhost", "root", "123456", "camisetas");
=======
                            $connection = new mysqli("localhost", "root", "123456", "camisetas");/*casa*/
                            //$connection = new mysqli("localhost", "root", "2asirtriana", "camisetas");/*clase*/
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
                          if ($connection->connect_errno) {
                             printf("Connection failed: %s\n", $connection->connect_error);
                          exit();
                         }
<<<<<<< HEAD
                         $result = $connection->query("SELECT id_equipo,nombre FROM equipo");
                         if ($result) {
                           while ($obj=$result->fetch_object()) {
                              $valor = $obj->id_equipo;
                              echo "<option  value='$valor'>";                              
                              echo $obj->nombre;
=======
                         $result = $connection->query("SELECT id_equipo FROM equipo");
                         if ($result) {
                           while ($obj=$result->fetch_object()) {
                              echo "<option>";
                              //echo $obj->nombre;
                              echo $obj->id_equipo;
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
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
<<<<<<< HEAD
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
=======
          $connection = new mysqli("localhost", "root", "123456", "camisetas");/*casa*/
          //$connection = new mysqli("localhost", "root", "2asirtriana", "camisetas");/*clase*/
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
          
          $connection->set_charset("uft8");
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //INSERTING THE NEW PRODUCT
          $id_camiseta1=$_POST['id_camiseta1'];
          $jugador=$_POST['jugador'];
          $dorsal=$_POST['dorsal'];
          $marca=$_POST['marca'];
          $publicidad=$_POST['publicidad'];
          $temporada=$_POST['temporada'];
          $competicion=$_POST['competicion'];
          $observaciones=$_POST['observaciones'];
            
          $cod_equipo=$_POST['cod_equipo'];
            
            
          $query="INSERT INTO camiseta VALUES('$id_camiseta1', '$jugador', '$dorsal', '$marca', '$publicidad', '$temporada', '$competicion', '$target_file', '$observaciones')";
          echo $query;
           if ($result = $connection->query($query)) {
          
          } else {
           echo "Fallo insert camiseta";
           exit();
          }
            
<<<<<<< HEAD
          $query2="INSERT INTO camiseta_equipo VALUES('$id_camiseta1', '$cod_equipo')";
=======
          /*$query2="INSERT INTO camiseta_equipo VALUES('$id_camiseta1', '$cod_equipo')";
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
          echo $query2;
           if ($result = $connection->query($query2)) {
          
          } else {
           echo "Fallo insert camiseta_equipo";
           exit();
<<<<<<< HEAD
          }
=======
          }*/
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
        }
      ?>

      <?php endif ?>      
            
  </body>
</html>