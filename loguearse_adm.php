<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feria de Universidades</title>
</head>
<body>
    <h1>Iniciar Sesion Como Administrador</h1>
    <!--Formulario de inicio de sesion-->
    <form action="modelo/loguear_adm.php" method = "post">
        <h2>Iniciar sesión</h2>
        <label for="">E-mail:</label> 
        <input type="text" name="correo_administrador" id="" required>
        <br><br>
        <label for="">Password:</label>
        <input type="text" name="password_administrador" id="" required>
        <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>