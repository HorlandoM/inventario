<!DOCTYPE html>
<html>
<head>
	<title>Agregar producto</title>
	<style>
		/* General */
		* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          
          /* Body */
          body {
            background-color: #6fb98f;
          }
          
          /* Title */
          .title {
            text-align: center;
            color: #2c7873;
            font-size: 30px;
          }
          
          /* Main Content */
          .contenido {
            height: 100vh;
            background-color: #004445;
            font-family: 'Segoe UI', system-ui, -apple-system, BlinkMacSystemFont, 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 14px;
            color: #fff;
            line-height: 1.5;
            overflow: hidden;
          }
          
          /* Table */
          .table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
          }
          .table th,
          .table td {
            padding: 10px;
            border: 1px solid #2c7873;
          }
          .table th {
            background-color: #2c7873;
            color: #fff;
            text-align: left;
          }
          .table tbody tr:nth-child(even) {
            background-color: #004445;
          }
          .table tbody tr:hover {
            background-color: #021c1e;
            cursor: pointer;
          }
          
          /* Links */
          a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px;
            background-color: #2c7873;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
          }
          a:hover {
            background-color: #004445;
          }
          
          /* Form */
          form {
            margin: 30px auto;
            max-width: 500px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
          }
          label {
            display: block;
            margin-bottom: 5px;
          }
          input[type=text],
          input[type=number],
          select,
          input[type=datetime],
          input[type=file] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
          }
          input[type=submit] {
            background-color: #2c7873;
            color: white;
            padding: 12px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
          }
          input[type=submit]:hover {
            background-color: #2c7873;
          }
          
          /* Navigation Menu */
          .menu {
            background-color: #2c7873;
            overflow: hidden;
            list-style: none;
            margin: 0;
            padding: 0;
          }
          .menu li {
            float: left;
          }
          .menu li a {
            display: block;
            padding: 14px 16px;
            color: #fff;
            text-align: center;
            text-decoration: none;
          }
          .menu li a:hover {
            background-color: #004445;
          }
          .menu .active {
            background-color: #021c1e;
          }
          
          /* Mobile Devices */
          @media (max-width: 600px) {
            .menu li {
              float: none;
            }
            .menu li a {
              width: 100%;
            }
          }
	</style>
</head>
<body>
<ul class="menu">
    <li><a href="main.php" >Inicio</a></li>
    <li><a href="inventario.php">Inventario</a></li>
    <li><a href="agregar.php"class="active">Nuevo Registro</a></li>
	<li><a href="productos_descontinuados.php">Productos descontinuados</a></li>
    <li action="logout.php" method="post">
        <a href="logout.php" type="submit">Cerrar sesión</a>
    </li>
</ul>
<?php
function conectar() {	
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "papeleria";
	$conexion = new mysqli($host, $usuario, $pass, $bd);
	if ($conexion->connect_error) {
		die("Error de conexión: " . $conexion->connect_error);
	}
	return $conexion;
}
$con = conectar();
$fecha = date("Y-m-d");
$hora = date('H:i:s');
if (isset($_POST['agregar'])) {
	if (isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['tmp_name'])) {
		$tipoArchivo = $_FILES['imagen']['type'];
		$tamanoArchivo = $_FILES['imagen']['size'];
		$imagenSubida = fopen($_FILES['imagen']['tmp_name'], 'r');
		$binariosImagen = fread($imagenSubida, $tamanoArchivo);
		$binariosImagen = mysqli_real_escape_string($con, $binariosImagen);
		$permitido = array("image/png", "image/jpeg");
		if (!in_array($tipoArchivo, $permitido)) {
			die("Archivo no permitido");
		}

	} else {
		$binariosImagen = NULL;
	}
	$id_productos = mysqli_real_escape_string($con, $_POST['id_productos']);
	$nombre = mysqli_real_escape_string($con, $_POST['nombre']);
	$cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
	$precio = mysqli_real_escape_string($con, $_POST['precio']);
	$descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
	$categoria = mysqli_real_escape_string($con, $_POST['categoria']);
	$fecha_ingreso = mysqli_real_escape_string($con, $_POST['fecha_ingreso']);
	$hora_ingreso = mysqli_real_escape_string($con, $_POST['hora_ingreso']);
	$sql = "INSERT INTO productos (id_productos, nombre, cantidad, precio, descripcion, categoria, imagen, fecha_ingreso, hora_ingreso) VALUES ('$id_productos', '$nombre', '$cantidad', '$precio', '$descripcion', '$categoria', '$binariosImagen', '$fecha_ingreso', '$hora_ingreso')";
	if ($con->query($sql) === TRUE) {
		echo "Producto agregado correctamente";
	} else {
		echo "Error al agregar el producto: " . $con->error;
	}

}
?>
<div>
	<br>
	<br>
<h1 align="center"class="title">Agregar producto</h1>
	<div>
		<form action="agregar.php" method="post" enctype="multipart/form-data">
		<label for="id_productos">ID del producto:</label>
		<input type="text" name="id_productos" id="id_productos" required>
		<br>
		<label for="nombre">Nombre del producto:</label>
		<input type="text" name="nombre" id="nombre" required>
		<br>
		<label for="cantidad">Cantidad:</label>
		<input type="number" name="cantidad"id="cantidad"  min="1" max="100"required>
		<br>
		<label for="precio">Precio:</label>
		<input type="number" name="precio" id="precio"  min="0" max="9999999" required>
		<br>
		<label for="descripcion">Descripción:</label>
		<input type="text" name="descripcion" id="descripcion" required>
		<br>
		<label for="categoria">Categoría:</label>
			<select name="categoria">
				<option value="0">Selecciona una categoria</option>
					<?php
					$categoria = "SELECT * FROM categorias";
					$resultado=mysqli_query($con,$categoria);
					while ($row = mysqli_fetch_array($resultado)) 
					{
						echo '<option value="'.$row['id'].'">'.$row['categoria'].'</option>';
					}
					?>
				</select>
		<br>
		<label for="imagen">Imagen:</label>
		<input type="file" name="imagen" id="imagen">
		<br>
				<label>Fecha de registro</label><br>
				<input type="datetime" name="fecha_ingreso" value="<?= $fecha?>" readonly><br>

				<label>Hora de registro</label><br>
				<input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br>

				<input type="submit" name="agregar" value="AGREGAR">

				<a href="main.php">REGRESAR</a>
			</form>
		</div>
	</div>
</body>
</html>