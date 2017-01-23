<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMISETA</title>
  </head>
  <body>
      <a href="insertar.php"><button>A INSERTAR</button></a><br>
      
    <?php
      /*casa*/ $connection = new mysqli("localhost", "root", "123456", "camisetas");
      //*clase*/ $connection = new mysqli("localhost", "tf", "12345", "tf");
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
              echo "<td>".$obj->club/seleccion."</td>";
              echo "<td>".$obj->nombre."</td>";
              echo "<td>".$obj->pais."</td>";
              echo "<td>".$obj->continente."</td>";
              echo "<td>".$obj->imagen_equipo."</td>";
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
              echo "<td>".$obj->imagen."</td>";
              echo "<td>".$obj->observaciones."</td>";
              echo "</tr>";
          }
          
          
          
          $result->close();
          unset($obj);
          unset($connection);
      }
    ?>
  </body>
</html>