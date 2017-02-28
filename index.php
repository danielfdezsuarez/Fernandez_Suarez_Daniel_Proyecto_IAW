<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <style>
      img {
        height: 50px;
        width: 50px;
      }
    </style>
  </head>
  <body>
      <header>
        <a href="admin.php"><button>Admin</button></a>
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
     
    ?>
      
    <?php if (!isset($_POST["cod_equipo"])) : ?>
      
        <form action="index.php" method="post" enctype="multipart/form-data">
          <br><fieldset>
            <span>ELEGIR EQUIPO CLUB</span>
              <select name="cod_equipo" required><br>
                    <?php
                      $connection = new mysqli("localhost", "root", "123456", "camisetas");
                      if ($connection->connect_errno) {
                         printf("Connection failed: %s\n", $connection->connect_error);
                      exit();
                     }
                     $result = $connection->query("SELECT * FROM equipo where club_seleccion='club'");
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
            <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
            
        <form action="index.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <span>ELEGIR EQUIPO SELECCIÓN</span>
              <select name="cod_equipo" required><br>
                    <?php
                      $connection = new mysqli("localhost", "root", "123456", "camisetas");
                      if ($connection->connect_errno) {
                         printf("Connection failed: %s\n", $connection->connect_error);
                      exit();
                     }
                     $result = $connection->query("SELECT * FROM equipo where club_seleccion='seleccion'");
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
            <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>
        
    <?php   
        echo "mira mis novedades";
    ?>
            
            
    <?php else: ?>      
        
        <table style="border:1px solid black">
            <thead>
                <tr>
                  <th>ID_Camiseta</th>
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
        
        $cod=$_POST['cod_equipo'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="select * from camiseta join camiseta_equipo on camiseta.id_camiseta=camiseta_equipo.id_camiseta join equipo on camiseta_equipo.id_equipo=equipo.id_equipo WHERE equipo.id_equipo='$cod'";
        if ($result = $connection->query($query)) {
            /*$obj = $result->fetch_object();
            $id_camiseta=$obj->id_camiseta;
            $jugador=$obj->jugador;
            $dorsal=$obj->dorsal;
            $marca=$obj->marca;
            $publicidad=$obj->publicidad;
            $temporada=$obj->temporada;
            $competicion=$obj->competicion;
            $observaciones=$obj->observaciones;
            $ruta=$obj->imagen;
            $nombre=$obj->nombre;*/
            
            
            echo "<br>";
            echo "Estás viendo el equipo: $nombre";
            echo "<br>";
            echo var_dump($query);
            echo "<br>";
            printf("<p>The select query returned %d rows.</p>", $result->num_rows);
            
            
        
            while($obj = $result->fetch_object()) {
              echo "<tr>";
              echo "<td>".$obj->id_camiseta."</a></td>";
              echo "<td>".$obj->jugador."</td>";
              echo "<td>".$obj->dorsal."</td>";
              echo "<td>".$obj->marca."</td>";
              echo "<td>".$obj->publicidad."</td>";
              echo "<td>".$obj->temporada."</td>";
              echo "<td>".$obj->competicion."</td>";
              $ruta2 = $obj->imagen;
              echo "<td><img src='$ruta2'></td>";
              echo "<td>".$obj->observaciones."</td>";
              echo "<td>
                        <form method='get'>
                          <a href='resultado.php?id=$obj->id_camiseta'>
                            <img src='ir.ico';/>
                          </a>
                        </form></td>";
              echo "</tr>";
                /*$obj->$nombre;
                echo "2-Estás viendo el equipo: $nombre";*/
          }
            
          $result->close();
          unset($obj);
          unset($connection);  
            
        }
        ?>
    
            
    <?php endif ?>
            
  </body>
</html>