<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR</title>
    <link rel="stylesheet" type="text/css" href=" ">
    <style>
      span {
        width: 100px;
        display: inline-block;
      }
    </style>
  </head>
  <body>
      
      <a href="index.php"><button>A INDEX</button></a><br><br>

      <?php
		if (!isset($_POST["cod"])) : ?>
        <form method="post">
          <fieldset>
            <legend>CAMISETA</legend>
            <span>ID_Camiseta:</span><input type="number" name="id_camiseta" required><br>
            <span>Jugador:</span><input type="text" name="jugador"><br>
            <span>Dorsal:</span><input type="number" name="dorsal"><br>
            <span>Marca:</span><input type="text" name="marca"><br>
            <span>Publicidad:</span><input type="text" name="publicidad"><br>
            <span>Temporada:</span><input type="text" name="temporada"><br>
            <span>Competición:</span><input type="text" name="competicion"><br>
            <span>Observaciones:</span><input type="text" name="observaciones"><br>
            <span>Imagen:</span><input type="file" name="imagen"><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form>
        <br>
            
        <form method="post">
          <fieldset>
            <legend>EQUIPO</legend>
            <span>ID_Equipo:</span><input type="number" name="id_equipo" required><br>
            <span>Club/Selección:</span><input type="radio" name="club/seleccion" value="Club" value="Seleccion"><input type="radio" name="club/seleccion" value="Seleccion"><br>
            <span>Nombre:</span><input type="text" name="nombre"><br>
            <span>País:</span><input type="text" name="pais"><br>
            <span>Continente:</span><input type="text" name="continente"><br>
            <span>Imagen_equipo:</span><input type="file" name="imagen_equipo"><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form>
        <br>
            
        <form method="post">
          <fieldset>
            <legend>camiseta_equipo</legend>
            <span>ID_Camiseta:</span><input type="number" name="id_camiseta2" required><br>
            <span>ID_Equipo:</span><input type="number" name="id_equipo2" required><br>
	    <span><input type="submit" value="Enviar"><br>
	      </fieldset>
        </form>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
      <?php else: ?>

      <?php
            echo "<h3>Showing data coming from the form</h3>";
            var_dump($_POST);
            //CREATING THE CONNECTION
      	    $connection = new mysqli("localhost", "root", "123456789", "tf");
           //TESTING IF THE CONNECTION WAS RIGHT
           if ($connection->connect_errno) {
           	printf("Connection failed: %s\n", $connection->connect_error);
	        exit();
	   }
  	   $codigo=$_POST['cod'];
  	   $consulta= "INSERT INTO CLIENTES VALUES('$codigo','".$_POST['id']."','".$_POST['lastname']."','".$_POST['name']."','".$_POST['address']."','".$_POST['phone']."')";
  	   var_dump($consulta);
  	   $result = $connection->query($consulta);
  	   if (!$result) {
   		    echo "Query Error";
       } else {
  		     echo "New client added";
  	   }
     ?>

      <?php endif ?>
  </body>
</html>