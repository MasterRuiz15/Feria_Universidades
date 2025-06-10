<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_uni = $_POST['id_universidad'];
        $nombre_uni = $_POST['nombre_universidad'];
        $nit_uni = $_POST['nit_universidad'];
        $correo_uni = $_POST['correo_universidad'];
        $telefono_uni = $_POST['telefono_universidad'];
        $sitio_web = $_POST['sitio_web_universidad'];
        $nombre_rector = $_POST['rector_universidad'];
    

    $query = "INSERT INTO Universidad(id_universidad, nombre_universidad, nit_universidad, correo_universidad, telefono_universidad, sitio_web_universidad, rector_universidad) VALUES ('$id_uni', '$nombre_uni', '$nit_uni', '$correo_uni', '$telefono_uni', '$sitio_web', '$nombre_rector')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Universidad Registrada!");
                    window.location.href = "../registrar_delegado.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>