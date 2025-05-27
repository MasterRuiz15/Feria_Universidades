<?php
    require 'conexion.php';

    // iniciar sesión para guardar los datos del usuario
    session_start();

    $administrador = $_POST['correo_administrador'];
    $password = $_POST['password_administrador'];

    $query_1 = "SELECT correo_administrador, COUNT(*) AS contar FROM Administrador WHERE correo_administrador = '$administrador' AND password_administrador = '$password'";

    $consulta = mysqli_query($conexion, $query_1) or trigger_error("Error en la consulta MySQL:  " . mysqli_error($conexion));  

    $resultado = mysqli_fetch_array($consulta);

    if($resultado['contar']>0)
    {

        $_SESSION['username'] = $administrador;

        // redirigir el administrador a su pagina
        header("location: ../pagina_adm.php");

        /*echo "El administrador existe en la BD<br>";
        echo $resultado['email'];*/
    }
    else
    {
        echo "El administrador no existe, o usuario o contraseña incorrecta";
    }
?>