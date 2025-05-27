<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_aco = $_POST['id_acompañante'];
        $nombre_aco = $_POST['nombre_acompañante'];

        $query = "INSERT INTO Acompañante(id_acompañante, nombre_acompañante) VALUES ('$id_aco', '$nombre_aco')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Acompañante registrado!");
                    window.location.href = "../registrar_acompañante.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>