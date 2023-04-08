<?php

$usuario=$_POST['usuario'];
$pass=$_POST['password'];

session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","user");

$consulta="SELECT*FROM usuarios WHERE Usuario = '$usuario' and password = '$pass'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_rol']==1){
    echo '<script language="javascript">alert("Haz ingresado como administrador");  window.location="main.php"</script>';
}else
    if($filas['id_rol']==2){
        echo '<script language="javascript">alert("Haz ingresado como cliente");  window.location="index.php"</script>';
    }
else{
    ?>
    <?php
    include("login.php");
    echo '<script language="javascript">alert("Usuario/contraseña incorecta");  window.location="login.php"</script>';
    ?>
    
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>    