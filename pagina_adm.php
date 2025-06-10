<?php
    require'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
    }
?>

<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página del administrador</title>
</head>
<body>
    <h1>Página del administrador</h1>
    <hr>
    <?php
       echo 'Usuario: '.$nombre_usuario;
    ?>
    <hr>
    <a href="registrar_acompañante.php">Registrar acompañante</a>
    <hr>
    <a href="registrar_administrador.php">Registrar administrador</a>
    <hr>
    <a href="registrar_apoyo.php">Registrar apoyo</a>
    <hr>
    <a href="registrar_colegio.php">Registrar colegio</a>
    <hr>
    <a href="registrar_delegado.php">Registrar delegado</a>
    <hr>
    <a href="registrar_docente.php">Registrar docente</a>
    <hr>
    <a href="registrar_estudiante.php">Registrar estudiante</a>
    <hr>
    <a href="registrar_guia.php">Registrar guia</a>
    <hr>
    <a href="registrar_ruta.php">Registrar ruta</a>
    <hr>
    <a href="registrar_universidad.php">Registrar universidad</a>
    <hr>
    <a href="cerrar_sesion.php">cerrar_sesion</a>
<body>
</html>