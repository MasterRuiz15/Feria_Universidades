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
    <title>Registrar Universidades</title>
</head>
<body>
    <h1>Registrar Universidades</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un apoyo-->
    <form action="modelo/reg_universidad.php" method = "post">
        <h2>Estudiante</h2>
        <label for="">Código:</label> 
        <input type="text" name="id_universidad" id="" required>
        <br><br>
        <label for="">Nombre:</label> 
        <input type="text" name="nombre_universidad" id="" required>
        <br><br>
        <label for="">Nit: Ident:</label> 
        <input type="text" name="nit_universidad" id="" required>
        <br><br>
        <label for="">Correo:</label> 
        <input type="text" name="correo_universidad" id="" required>
        <br><br>
        <label for="">Telefono:</label> 
        <input type="text" name="telefono_universidad" id="" required>
        <br><br>
        <label for="">Sitio Web:</label> 
        <input type="text" name="sitio_web_universidad" id="" required>
        <br><br>
        <label for="">Noombre del Rector:</label> 
        <input type="text" name="rector_universidad" id="" required>
        <br><br>
        <button type="submit">Registrar</button>
        <button onclick="history.back()">Volver</button>
        </form>
</body>
</html>