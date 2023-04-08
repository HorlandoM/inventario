<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuarios</title>
	<link rel="stylesheet" type="text/css" href="css/styleregister.css">
</head>
<body>
<?php
function conectar()
{
	$host = "localhost";
	$usuario = "root";
	$pass = "";
	$bd = "user";
	$conexion = mysqli_connect($host, $usuario, $pass, $bd);

	if (!$conexion) {
		die("Error de conexión: " . mysqli_connect_error());
	}

	return $conexion;
}

$con = conectar();
?>
<br>
<br>
<br>
<div>
	<form action="registrar_login.php" method="POST" enctype="multipart/form-data">
		<h1>REGISTER</h1>

		<label>Id rol:</label><br>
		<input type="text" name="id_rol" maxlength="30" value="2" readonly><br>

		<label>Nombre:</label><br>
		<input type="text" name="nombres" maxlength="50" required><br>

		<label>Apellido paterno:</label><br>
		<input type="text" name="ap_paterno" maxlength="50" required><br>

		<label>Apellido materno:</label><br>
		<input type="text" name="ap_materno" maxlength="50" required><br>

		<label>Edad:</label><br>
		<input type="number" name="edad" min="18" max="99" required><br>

		<label>Usuario:</label><br>
		<input type="text" name="usuario" maxlength="20" required><br>

		<label>Contraseña:</label><br>
		<input type="password" name="password" maxlength="20" required><br>

		<label>Correo:</label><br>
		<input type="email" name="correo" maxlength="40" required><br>

		<input type="submit" name="agregar" value="AGREGAR">
	</form>
	<a href="login.php">inicio de sesión</a>
	<br>
	<br>
	<br>
</div>
</body>
</html>