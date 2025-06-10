<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar administrador</title>
</head>
<body>
    <h1>Registrar administrador</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un administrador-->
    <form action="modelo/reg_administrador.php" method = "post">
        <h2>Administrador</h2>
        <label for="">Código:</label> 
        <input type="text" name="id_administrador" id="" required>
        <br><br>
        <label for="">Nombre:</label> 
        <input type="text" name="nombre_administrador" id="" required>
        <br><br>
        <label for="">Correo:</label> 
        <input type="text" name="correo_administrador" id="" required>
        <br><br>
        <label for="">Password:</label> 
        <input type="text" name="password_administrador" id="" required>
        <br><br>
        <button type="submit">Registrar</button>
        <button onclick="history.back()">Volver</button>
    </form>
</body>
</html>