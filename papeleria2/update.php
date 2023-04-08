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
$id_productos =$_POST['id_productos'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
$fecha_ingreso= date("y/m/d");
$hora_ingreso = date('h:i:s');


if ($id_productos!=null || $nombre!=null || $cantidad!=null || $precio!=null || $descripcion!=null || $categoria!=null || $imagen!=null || $fecha_ingreso!=null || $hora_ingreso!=null) 
{
	$sql="UPDATE productos SET id_productos='$id_productos',nombre='$nombre',cantidad='$cantidad', precio='$precio',descripcion='$descripcion',categoria='$categoria', fecha_ingreso='$fecha_ingreso', hora_ingreso='$hora_ingreso' WHERE id_productos ='$id_productos'";
	mysqli_query($con, $sql);
	if($user=1){
		header("location:index.php");
	}
}

?>