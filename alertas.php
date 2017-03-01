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
    <title>ALERTAS</title>
    <style>
      img {
        height: 50px;
        width: 50px;
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
      </header>
      
    <?php
      $connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
      if ($result = $connection->query("select * from alerta;")) {
          printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>ID_alerta</th>
          <th>ID_Equipo</th>
          <th>Mail</th>
          <th>Editar</th>
          <th>Borrar</th>
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->id_alerta."</a></td>";
              echo "<td>".$obj->id_equipo."</td>";
              echo "<td>".$obj->mail."</td>";
              echo "<td>
                        <form method='get'>
                          <a href='editar_alerta.php?id=$obj->id_alerta'>
                            <img src='editar.png';/>
                          </a>
                        </form></td>";
              echo "<td>
                        <form method='get'>
                          <a href='borrar_alerta.php?id=$obj->id_alerta'>
                            <img src='borrar.png';/>
                          </a>
                        </form></td>";
              echo "</tr>";
          }
          
          $result->close();
          unset($obj);
          unset($connection);
      }
    ?>
  </body>
</html>