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
$sql = "SELECT * FROM productos";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventario</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		body {
			background-color: #6fb98f;
		}
	</style>
</head>
<body>
<ul class="menu">
	<li><a href="main.php" >Inicio</a></li>
    <li><a href="inventario.php"class="active">Inventario</a></li>
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
	<h1 align="center" class="title">Inventario</h1>
	<br>
	<br>
	<!-- BUSCADOR DE PROFUCTOS -->
	<from action="index.php" method="post">
		<div align="center">
			<label for="search">Buscar producto:</label>
			<input type= "text" name="search" id="search"style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;">
			<input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
			<?php
			//buscar por nombre
			 if (isset($_POST['search'])) {
				$search = $_POST['search'];
				$sql = "SELECT * FROM productos WHERE nombre LIKE '%$search%'";
				$query = mysqli_query($con, $sql);
				if (mysqli_num_rows($query) == 0) {
					echo "<br>";
					echo "<h3 align='center'>No se encontraron resultados</h3>";
				}
			} 
			//buscar por id
			if (isset($_POST['search'])) {
				$search = $_POST['search'];
				$sql = "SELECT * FROM productos WHERE id_productos LIKE '%$search%'";
				$query = mysqli_query($con, $sql);
				if (mysqli_num_rows($query) == 0) {
					echo "<br>";
					echo "<h3 align='center'>No se encontraron resultados</h3>";
				}
			}
			?>
		</div>
	<br>
	<table class="table" border="white">
		<thead>
			<tr>
				<th>Id del producto</th>
				<th>Nombre del producto</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Categoria</th>
				<th>Imagen</th>
				<th>Fecha de ingreso</th>
				<th>Hora de ingreso</th>
				<th>Editar</th>
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
					<td><img width="100" src="data: image/jpg; base64, <?php echo base64_encode($row['imagen']); ?>"></td>
					<td><?php echo $row['fecha_ingreso'] ?></td>
					<td><?php echo $row['hora_ingreso'] ?></td>
					<td><a href="actualizar.php?id=<?php echo $row['id_productos'] ?>">
							<img src="img/editar.png" width="30" height="30">
						</a></td>
					<td><a href="eliminar.php?id=<?php echo $row['id_productos'] ?>">
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