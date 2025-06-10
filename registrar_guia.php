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
    <title>Registrar guia</title>
</head>
<body>
    <h1>Registrar guia</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un apoyo-->
    <form action="modelo/reg_guia.php" method="post" enctype="multipart/form-data">
    <h2>Apoyo</h2>
    <label for="">Código:</label> 
    <input type="text" name="id_guia" required>
    <br><br>
    <label for="">Nombre:</label> 
    <input type="text" name="nombre_guia" required>
    <br><br>
    <label for="">Correo:</label> 
    <input type="text" name="correo_guia" required>
    <br><br>
    <label for="">Password:</label> 
    <input type="text" name="password_guia" required>
    <br><br>
    <label for="foto_guia">Foto:</label> 
    <input type="file" name="foto_guia" accept="image/*" capture="user" required>
    <br><br>
    <button type="submit">Registrar</button>
    <button onclick="history.back()">Volver</button>
</form>
</body>
</html>