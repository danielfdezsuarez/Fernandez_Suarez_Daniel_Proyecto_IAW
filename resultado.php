<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
      .boton {
        background-color: sandybrown;
        color: white;
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
        <a href="suscripcion.php"><button class="boton">Suscribirse a las novedades de este equipo</button></a>
        <form action="suscripcion.php" method="post">
            <button type="submit" name="cosa" value="<php echo $id_equipo; ?>"></button>
            
        </form>
      </header><br>
      
      <?php if (!isset($_POST["id_camiseta"])) : ?>

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
            
        }
      
        $query2="SELECT id_equipo FROM camiseta_equipo WHERE id_camiseta='$cod'";
        if ($result = $connection->query($query2)) {
            $obj = $result->fetch_object();
            //$id_camiseta=$obj->id_camiseta;
            $id_equipo=$obj->id_equipo;
        }
      
        
        $jugadormayus=ucfirst($jugador);
        $marcamayus=ucfirst($marca);
        $publicidadmayus=ucfirst($publicidad);
        $competicionmayus=ucfirst($competicion);
        $observacionesmayus=ucfirst($observaciones);
      
        ?>
        
        <form action="editar_camiseta.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend>//</legend>
            <input type="hidden" value="<?php echo $cod; ?>" name="id_camiseta"/>
            <span>Jugador:</span><input type="text" name="jugador" value="<?php echo $jugadormayus; ?>"><br>
            <span>Dorsal:</span><input type="number" name="dorsal" value="<?php echo $dorsal; ?>"><br>
            <span>Marca:</span><input type="text" name="marca" value="<?php echo $marcamayus; ?>"><br>
            <span>Publicidad:</span><input type="text" name="publicidad" value="<?php echo $publicidadmayus; ?>"><br>
            <span>Temporada:</span><input type="text" name="temporada" value="<?php echo $temporada; ?>"><br>
            <span>Competición:</span><input type="text" name="competicion" value="<?php echo $competicionmayus; ?>"><br>
            <span>Observaciones:</span><input type="text" name="observaciones" value="<?php echo $observacionesmayus; ?>"><br><br>
            <img src='<?php echo $ruta; ?>'>
          </fieldset>
        </form>

      <?php else: ?>
    
      <?php endif ?>

  </body>
</html>