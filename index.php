<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMISETA</title>
<<<<<<< HEAD
    <style>
      img {
        height: 50px;
        width: 50px;
      }
    </style>
=======
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
  </head>
  <body>
      <header>
        <a href="insertar.php"><button>INSERTAR CAMISETA</button></a>
        <a href="insertar_equipo.php"><button>INSERTAR EQUIPO</button></a>
        <a href="login.php"><button>Login</button></a>
        <a href="logout.php"><button>Cerrar sesion</button></a>
      </header>
      
    <?php
<<<<<<< HEAD
      $connection = new mysqli("localhost", "root", "123456", "camisetas");
=======
      /*casa*/ $connection = new mysqli("localhost", "root", "123456", "camisetas");
      //*clase*/ $connection = new mysqli("localhost", "root", "2asirtriana", "camisetas");
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }
      
      if ($result = $connection->query("select * from camiseta join camiseta_equipo on camiseta.id_camiseta=camiseta_equipo.id_camiseta join equipo on camiseta_equipo.id_equipo=equipo.id_equipo;")) {
          printf("<p>The select query returned %d rows.</p>", $result->num_rows);
    ?>

 
      <table style="border:1px solid black">
      <thead>
        <tr>
          <th>ID_Camiseta</th>
          <th>ID_Equipo</th>
          <th>Club/Seleccion</th>
          <th>Nombre</th>
          <th>Pais</th>
          <th>Continente</th>
          <th>Imagen_equipo</th>  
          <th>Jugador</th>
          <th>Dorsal</th>
          <th>Marca</th>
          <th>Publicidad</th>
          <th>Temporada</th>
          <th>Competición</th>
          <th>Imagen</th>
          <th>Observaciones</th>
      </thead>

     <?php
          while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->id_camiseta."</td>";
              echo "<td>".$obj->id_equipo."</td>";
              echo "<td>".$obj->club_seleccion."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->continente."</td>";
<<<<<<< HEAD
              $ruta = $obj->imagen_equipo;
              echo "<td><img src='$ruta'></td>";
=======
              echo "<td>".$obj->imagen_equipo."</td>";
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
<<<<<<< HEAD
              $ruta2 = $obj->imagen;
              echo "<td><img src='$ruta2'></td>";
=======
              echo "<td>".$obj->imagen."</td>";
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
              echo "<td>".$obj->observaciones."</td>";
              echo "</tr>";
          }
          
<<<<<<< HEAD
=======
          
          
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
          $result->close();
          unset($obj);
          unset($connection);
      }
    ?>
  </body>
</html>