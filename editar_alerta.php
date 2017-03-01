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
    <title>EDITAR EQUIPO</title>
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
    </style>
  </head>
  <body>
      <header>
        <a href="index.php"><button>INDEX</button></a>
        <a href="insertar.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>Login</button></a>
        <a href="logout.php"><button>Cerrar sesion</button></a>
      </header><br>
      
      <?php if (!isset($_POST["id_alerta"])) : ?>

        <?php
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM alerta WHERE id_alerta='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $id_alerta=$obj->id_alerta;
            $id_equipo=$obj->id_equipo;
            $mail=$obj->mail;
        }
        ?>

        <form action="editar_alerta.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR EQUIPO</legend>
            <span>ID_Alerta:</span><input type="text" name="id_alerta" value="<?php echo $id_alerta; ?>"><br>
            <span>Equipo:</span><select name="id_equipo" required><br>
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
                              echo "<option  value='$valor'";
                              if ($valor==$id_equipo) {
                                  echo " selected ";
                              }
                              echo ">";                              
                              echo $obj->nombre;
                              echo "</option>";
                           }
                         } else {
                           printf("Query failed: %s\n", $connection->connect_error);
                           exit();
                         }
                        ?>
                        </select><br>
              <span>Mail:</span><input type="text" name="mail" value="<?php echo $mail; ?>"><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>

      <?php else: ?>

        <?php
        
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        $id_alerta=$_POST['id_alerta'];
        $id_equipo=$_POST['id_equipo'];
        $mail=$_POST['mail'];
                    
        $consulta="Update alerta SET 
        id_alerta='$id_alerta',
        id_equipo='$id_equipo',
        mail='$mail' WHERE id_alerta='$id_alerta'";
            
        $result = $connection->query($consulta);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($consulta);
        } else {
            echo "actualizado correctamente query2";
            echo var_dump($consulta);
            header("Refresh:2; url=index.php");
        }
        
        ?>

      <?php endif ?>

  </body>
</html>