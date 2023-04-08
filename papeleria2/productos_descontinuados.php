<?php
session_start();
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
$sql = "SELECT * FROM descontinuados";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Productos</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body {
			background-color: #6fb98f;
		}
	</style>

</head>

<body>
	<div>
	<ul class="menu">
      <li><a href="main.php" >Inicio</a></li>
      <li><a href="inventario.php">Inventario</a></li>
      <li><a href="agregar.php">Nuevo Registro</a></li>
      <li><a href="productos_descontinuados.php"class="active">Productos descontinuados</a></li>
      <li>
        <form action="logout.php" method="post">
          <a href="logout.php" type="submit">Cerrar sesión</a>
        </form>
      </li>
    </ul>
<br>
<br>
		<h1 align="center" class="title">Productos descontinuados</h1>
		<br>
		<br>
		<form action="index.php" method="post">
			<div align="center">
				<label for="search-id">Buscar producto:</label>
				<input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
				<input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
			</div>
		</form>
		<?php
		if (isset($_POST['id'])) {
			$id = $_POST['id'];
			$sql = "SELECT * FROM descontinuados WHERE id_productos = '$id'";
			$query = mysqli_query($con, $sql);
		}
		?>
		<br>
		<table class="table" border="white">
			<thead>
				<tr>
					<th>Id del producto</th>
					<th>Nombre del producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>descripcion</th>
					<th>Categoria</th>
					<th>Imagen</th>
					<th>Fecha de salida</th>
					<th>Hora de salida</th>
					<th>Eliminar</th>
				</tr>

			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_array($query)) {


				?>
					<tr class="contenido">
						<td><?php echo $row['id_productos'] ?></td>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['cantidad'] ?></td>
						<td><?php echo $row['precio'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td><?php echo $row['categoria'] ?></td>
						<td><img width="100" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>"></td>
						<td><?php echo $row['fecha_salida'] ?></td>
						<td><?php echo $row['hora_salida'] ?></td>
						<td><a href="eliminar_productos_descontinuados.php?id=<?php echo $row['id_productos'] ?>">
								<img src="img/eliminar.png" width="30" height="30">
							</a></td>
					</tr>

				<?php
				}
				?>
			</tbody>
	</div>
</body>

</html>