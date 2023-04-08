<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylemain.css">
    <style>
		body {
			background-color: #6fb98f;
		}
	</style>
    <title>Tablero</title>
  </head>
  <body>
    <ul class="menu">
      <li><a href="main.php" class="active">Inicio</a></li>
      <li><a href="inventario.php">Inventario</a></li>
      <li><a href="agregar.php">Nuevo Registro</a></li>
      <li><a href="productos_descontinuados.php">Productos descontinuados</a></li>
      <li>
        <form action="logout.php" method="post">
          <a href="logout.php" type="submit">Cerrar sesión</a>
        </form>
      </li>
    </ul>
    <br>
    <br>
    <h1 align="center"class="title">Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <br>
    <br>
    <!-- dashboard -->
  </body>
</html>