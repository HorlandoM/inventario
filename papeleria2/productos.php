<?php
//include ("conexion.php");
function conectar()
{
  $host = "localhost";
  $usuario = "root";
  $pass = "";
  $bd = "papeleria";
  $conexion = mysqli_connect($host, $usuario, $pass);
  mysqli_select_db($conexion, $bd);
  return $conexion;
}
$con = conectar();
$sql = "SELECT * FROM productos";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Punto de venta</title>
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="css/style_productos.css">
<!--   <link rel="stylesheet" type="text/css" href="css/style_menu.css"> -->
  <style>
    body {
      background-color: #6fb98f;
    }
  </style>

</head>

<body>
  <ul class="menu">
    <li><a href="productos.php" class="active">Productos</a></li>
    <li><a href="libretas.php">Libretas</a></li>
    <li><a href="escenciales.php">Escenciales para la escuela</a></li>
    <li><a href="arte.php">Arte</a></li>
    <li><a href="libros.php">Libros</a></li>
    <li style="float:right"><a href="login.php">Salir</a></li>
  </ul>
  <h1 align="center">Inicio</h1>
  <form action="productos.php" method="post">
    <div align="center">
      <label for="search-id">Buscar por ID:</label>
      <input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
      <input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
    </div>
  </form>
  <?php
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM productos WHERE id_productos = '$id'";
    $query = mysqli_query($con, $sql);
  }
  ?>
  <br>
  <?php
  while ($row = mysqli_fetch_array($query)) {


  ?>
  <div class="flex-container">
    <div class="flex-item">
      <div class="card-title">
        <p>Codigo: <?php echo $row['id_productos'] ?></p>
        <h4>Nombre: <?php echo $row['nombre'] ?></h4>
      </div>
      <div class="card-image">
        <p>Imagen:</p>
        <img width="100" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>">
      </div>
      <div class="card-content">
        <p> Descripcion: <?php echo $row['descripcion'] ?></p>
      </div>
      <div class="card-action center">
        <p class="waves-effect waves-orange btn " href="" id="13">Precio: <?php echo $row['precio'] ?></p>
      </div>
    </div>
  <?php
  }
  ?>
  </div>
</body>

</html>