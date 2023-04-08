<?php
function conectar()
{
	$host="localhost";
	$usuario="root";
	$pass="";
	$bd="user";
	$conexion=mysqli_connect($host,$usuario,$pass);
	mysqli_select_db($conexion,$bd);
	return $conexion;
}
$con=conectar();

date_default_timezone_set('America/Mexico_City');


//$id=$_POST['id'];
$id_rol=$_POST['id_rol'];
$Nombres=$_POST['Nombres'];
$Ap=$_POST['Ap'];
$Am=$_POST['Am'];
$Edad=$_POST['Edad'];
$Usuario=$_POST['Usuario'];
$password=$_POST['password'];
$Correo=$_POST['Correo'];

if($id_rol!=null||$Nombres!=null||$Ap!=null||$Am!=null||$Edad!=null||$Usuario!=null||$password!=null||$Correo!=null)
{
    $sql="insert into usuarios(id_rol,Nombres,Ap,Am,Edad,Usuario,password,Correo)values('".$id_rol."','".$Nombres."','".$Ap."','".$Am."','".$Edad."','".$Usuario."','".$password."','".$Correo."')";
    mysqli_query($con,$sql);
    if($user=1)
    {
        echo '<script language="javascript">alert("Registrado correctamente");  window.location="login.php"</script>';
    }
}
?>