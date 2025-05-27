<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_est = $_POST['id_estudiante'];
        $nombre_est = $_POST['nombre_estudiante'];
        $doc_ident_est = $_POST['doc_ident_estudiante'];
        $correo_est = $_POST['correo_estudiante'];
        $telefono_est = $_POST['telefono_estudiante'];
        $id_col = $_POST['id_colegio'];
        $id_rut = $_POST['id_ruta'];
        

        $query = "INSERT INTO Estudiante(id_estudiante, nombre_estudiante, doc_ident_estudiante, correo_estudiante, telefono_estudiante, id_colegio, id_ruta) VALUES ('$id_est', '$nombre_est', '$doc_ident_est', '$correo_est', '$telefono_est', '$id_col', '$id_rut')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type="text/javascript">;
                    alert("Estudiante registrado!");
                    window.location.href = "../registrar_estudiante.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>