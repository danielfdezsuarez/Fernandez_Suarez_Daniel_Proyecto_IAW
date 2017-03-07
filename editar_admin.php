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
    <title>EDITAR ADMIN</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
          span {
            width: 100px;
            display: inline-block;
          }
          fieldset img {
            max-height: 900px;
            max-width: 900px;  
          }
          <?php include 'css/body.css'; ?>
          <?php include 'css/logo.css'; ?>
    </style>
  </head>
  <body>
      <header>
        <a href="index.php"><button>INDEX</button></a>
        <a href="admin.php"><button>ADMIN</button></a>
        <a href="insertar.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="alertas.php"><button>ALERTAS</button></a>
        <a href="newadmin.php"><button>NEWADMIN</button></a>
        <a href="login.php"><button>LOGIN</button></a>
        <a href="logout.php"><button>LOGOUT</button></a>
      </header>
      <?php include 'logo.php'; ?><br>
      
      <?php if (!isset($_POST["id_user"])) : ?>

        <?php
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM usuario WHERE id_user='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $id_user=$obj->id_user;
            $user=$obj->user;
            $password=$obj->password;
            $mail=$obj->mail;
        }
        ?>

        <form action="editar_admin.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR ADMIN</legend>
            <span>ID_user:</span><input type="number" name="id_user" value="<?php echo $id_user; ?>"><br>
            <span>User:</span><input type="text" name="user" value="<?php echo $user; ?>"><br>
            <span>Password:</span><input type="text" name="password" value="<?php echo $password; ?>"><br>
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
        $id_user=$_POST['id_user'];
        $user=$_POST['user'];
        $password=$_POST['password'];
        $mail=$_POST['mail'];
                    
        $consulta="Update usuario SET 
        id_user='$id_user',
        user='$user',
        password=md5('$password'),
        mail='$mail' WHERE id_user='$id_user'";
            
        $result = $connection->query($consulta);
        if (!$result) {
            echo "WRONG QUERY";
            echo var_dump($consulta);
        } else {
            echo "actualizado correctamente query2";
            echo var_dump($consulta);
            header("Refresh:2; url=usuarios.php");
        }
        
        ?>

      <?php endif ?>

  </body>
</html>