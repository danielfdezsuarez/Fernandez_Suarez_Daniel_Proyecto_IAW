<?php
  session_start();
?>
<<<<<<< HEAD

=======
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>LOGIN</title>
=======
    <title></title>
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
    <link rel="stylesheet" type="text/css" href=" ">
  </head>
  <body>

    <?php
        //FORM SUBMITTED
        if (isset($_POST["user"])) {
<<<<<<< HEAD
          $connection = new mysqli("localhost", "root", "123456", "camisetas");
          
=======
          //CREATING THE CONNECTION
          $connection = new mysqli("localhost", "root", "123456", "camisetas");/*casa*/
          //$connection = new mysqli("localhost", "root", "2asirtriana", "camisetas");/*clase*/
          //TESTING IF THE CONNECTION WAS RIGHT
>>>>>>> 111879f8e58c23d263215f797b940356f6f10134
          if ($connection->connect_errno) {
              printf("Connection failed: %s\n", $connection->connect_error);
              exit();
          }
          //MAKING A SELECT QUERY
          //Password coded with md5 at the database. Look for better options
          $consulta="select * from usuario where user='".$_POST["user"]."' and password='".$_POST["password"]."'";
          //Test if the query was correct
          //SQL Injection Possible
          //Check http://php.net/manual/es/mysqli.prepare.php for more security
          if ($result = $connection->query($consulta)) {
              //No rows returned
              if ($result->num_rows===0) {
                echo "LOGIN INVALIDO";
              } else {
                //VALID LOGIN. SETTING SESSION VARS
                $_SESSION["user"]=$_POST["user"];
                $_SESSION["language"]="es";
                header("Location: index.php");
              }
          } else {
            echo "Wrong Query";
          }
      }
    ?>

    <form action="login.php" method="post">

      <p><input name="user" required></p>
      <p><input name="password" type="password" required></p>
      <p><input type="submit" value="Log In"></p>

    </form>



  </body>
</html>