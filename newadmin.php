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
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>NUEVO ADMIN</title>
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
      fieldset{
        max-width: 400px;  
      }
      <?php include 'css/body.css'; ?>
      <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="index.php"><button>INDEX</button></a>
        <a href="admin.php"><button>ADMIN</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["user"])) : ?>
        <?php
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          $connection->set_charset("utf8");

          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }

        ?>
      
          <form action="newadmin.php" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>NUEVO ADMIN</legend>
                    <input type="hidden" name="id_user"/>
                    <span>Usuario:</span><input type="text" name="user" required><br>
                    <span>Password:</span><input type="password" name="password" required><br>
                    <span>Mail:</span><input type="email" name="mail"><br>
                    <span><input type="submit" value="Enviar"><br>
              </fieldset>
          </form>

      <?php else: ?>      
              
      <?php
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          $connection->set_charset("uft8");
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          
          $id_user=$_POST['id_user'];
          $user=$_POST['user'];
          $password=$_POST['password'];
          $mail=$_POST['mail'];
          
          $query="INSERT INTO usuario VALUES('', '$user', md5('$password'), '$mail')";
            
          echo var_dump($query);
          
          if ($result = $connection->query($query)) {
          
          } else {
           echo "Fallo insert usuario";
           exit();
          }
          
      ?>
     
      <?php endif ?>   
    
  </body>
</html>