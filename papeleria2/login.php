<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylelogin.css">
<title>Acceso de usuario</title>
</head>
<body>
    <br>
    <br>
    <br>
    <div class="login-form">
        <form action="validar_login.php" method="post">
            <h1>LOGIN</h1>
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Ingresar">
    </form>
    <a href="registro_login.php">Registrarse</a>
</div>
</body>
</html>