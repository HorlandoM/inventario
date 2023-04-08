<?php
	//include("conexion.php");
	function conectar()
	{
	$host="localhost";
	$usuario="root";
	$pass="";
	$bd="papeleria";
	$conexion=mysqli_connect($host,$usuario,$pass);
	mysqli_select_db($conexion,$bd);
	return $conexion;
	}
	$con = conectar();
	date_default_timezone_set('America/Mexico_City');
	$fecha=date("d/m/Y");
	$hora=date('h:i:s');
	$id=$_GET['id'];
	$sql = "SELECT * FROM productos WHERE id_productos = '$id'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Actualizar producto</title>
	<link rel="stylesheet" type="text/css" href="css/styleagregar.css">
</head>
<body>
		<div>
			<form action="update.php" method="POST">
				<label>Id del productos</label><br>

				<input type="text" name="id_productos" maxlength="11" value="<?php echo $row['id_productos']?>"><br><br>

				<label>Nombre</label><br>
				<input type="text" name="nombre" maxlength="30" value="<?php echo $row['nombre']?>"><br><br>
				
				<label>Cantidad</label><br>
				<input type="text" name="cantidad" maxlength="11" value="<?php echo $row['cantidad']?>"><br><br>

				<label>Precio</label><br>
				<input type="text" name="precio" maxlength="5" value="<?php echo $row['precio']?>"><br><br>

				<label>Descripcion</label><br>
				<input type="text" name="descripcion" maxlength="500" value="<?php echo $row['descripcion']?>"><br><br>
				
				<label>Categoria</label><br>
				<!--mostrar el nombre de la categoria en el select-->
				<!-- <input type="text" name="categoria" maxlength="500" value="<?php echo $row['categoria']?>" readonly><br><br> -->
				 <select name="categoria">
					<option value="0">Selecciona una categoria</option>
					<?php
					$categoria = "SELECT * FROM categorias";
					//$categoria = "SELECT * FROM categorias WHERE id = '$cate'";
					$resultado=mysqli_query($con,$categoria);
					while ($row = mysqli_fetch_array($resultado)) 
					{
						echo '<option value="'.$row['id'].'">'.$row['categoria'].'</option>';
					}
					?>
				</select> 
				<br><br>
				<label>Imagen</label><br>
				<img width="100" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>">
				<br><br>
				<label>Fecha de atualizacion</label><br>
				<input type="text" name="fecha_ingreso" value="<?= $fecha?>"readonly><br><br>

				<label>Hora de actualizacion</label><br>
				<input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br><br>

				<input type="submit" name="" value="Actualizar">

				<a href="inventario.php">REGRESAR</a>
			</form>
		</div>
</body>
</html>
