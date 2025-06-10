<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_rut = $_POST['id_ruta'];
        $nombre_rut = $_POST['nombre_ruta'];
        $id_gui= $_POST['id_guia'];
        $id_acom = $_POST['id_acompañante'];

        

        $query = "INSERT INTO Ruta(id_ruta, nombre_ruta, id_guia, id_acompañante) VALUES ('$id_rut', '$nombre_rut', '$id_gui', '$id_acom')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Ruta registrada!");
                    window.location.href = "../registrar_ruta.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>