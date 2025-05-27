<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_adm = $_POST['id_administrador'];
        $correo_adm = $_POST['correo_administrador'];
        $password_adm = $_POST['password_administrador'];
        $nombre_adm = $_POST['nombre_administrador'];

        $query = "INSERT INTO Administrador(id_administrador, correo_administrador, password_administrador, nombre_administrador) VALUES ('$id_adm', '$correo_adm', '$password_adm', '$nombre_adm')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Administrador registrado!");
                    window.location.href = "../registrar_administrador.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>