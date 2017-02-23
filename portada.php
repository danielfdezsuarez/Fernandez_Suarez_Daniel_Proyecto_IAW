<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PORTADA</title>
    <style>
      img {
        height: 50px;
        width: 50px;
      }
    </style>
  </head>
  <body>
      <header>
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
     
    ?>
      
    <?php if (!isset($_POST["id_equipo"])) : ?>
      
        <form action="portada.php" method="post" enctype="multipart/form-data">
          <br><fieldset>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_equipo"/>
            
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
            
        <form action="portada.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_equipo"/>
            
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
        
        <?php
        
        $cod=$_GET['id'];
        $connection = new mysqli("localhost", "root", "123456", "camisetas");
        if ($connection->connect_errno) {
            printf("Connection failed: %s\n", $connection->connect_error);
            exit();
        }
        
        $query="SELECT * FROM camiseta WHERE id_camiseta='$cod'";
        if ($result = $connection->query($query)) {
            $obj = $result->fetch_object();
            $id_camiseta=$obj->id_camiseta;
            $jugador=$obj->jugador;
            $dorsal=$obj->dorsal;
            $marca=$obj->marca;
            $publicidad=$obj->publicidad;
            $temporada=$obj->temporada;
            $competicion=$obj->competicion;
            $observaciones=$obj->observaciones;
            $ruta=$obj->imagen;
            //echo var_dump($ruta);
            echo var_dump($query);
            
        }    
        
        ?>
            
        <form action="portada.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>EDITAR CAMISETA</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_camiseta"/>
            <span>Jugador:</span><input type="text" name="jugador" value="<?php echo $jugador; ?>"><br>
            <span>Dorsal:</span><input type="number" name="dorsal" value="<?php echo $dorsal; ?>"><br>
            <span>Marca:</span><input type="text" name="marca" value="<?php echo $marca; ?>"><br>
            <span>Publicidad:</span><input type="text" name="publicidad" value="<?php echo $publicidad; ?>"><br>
            <span>Temporada:</span><input type="text" name="temporada" value="<?php echo $temporada; ?>"><br>
            <span>Competición:</span><input type="text" name="competicion" value="<?php echo $competicion; ?>"><br>
            <span>Observaciones:</span><input type="text" name="observaciones" value="<?php echo $observaciones; ?>"><br>
            <span>Imagen:</span><input type="file" name="imagen"><img src='<?php echo $ruta; ?>'><br><br>
                <fieldset>
                    <legend>EQUIPO</legend>
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
                        </select>
                </fieldset>
	        <br><span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form><br>    
            
    
            
    

    <?php
          /* <php 
          if isset $_POST {
            muestro novedades
          } else {
            $_POST $id_equipo
          }
          */
          $result->close();
          unset($obj);
          unset($connection);
      
    ?>
            
    <?php endif ?>
            
  </body>
</html>