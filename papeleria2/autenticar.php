<?php
    $conexion=mysqli_connect("localhost","root","","user");
    $username = $POST['user'];
    $password = $POST['pass'];
    $sql = "select * from usuarios where n_usuario = '$username' and contrasena = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        echo "<h1><center> Autentificaci&oacuten exitosa</center></h1>";
    }
    else
    {
        echo "<h1>Error de Autentificaci&oacuten</h1>";
    }
?>