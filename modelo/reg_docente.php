<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_doc = $_POST['id_docente'];
        $nombre_doc = $_POST['nombre_docente'];
        $doc_ident_doc = $_POST['doc_ident_docente'];
        $correo_doc = $_POST['correo_docente'];
        $telefono_doc = $_POST['telefono_docente'];
        $password_doc = $_POST['password_docente'];
        $id_col = $_POST['id_colegio'];
        $id_rut = $_POST['id_ruta'];
        

        $query = "INSERT INTO Docente(id_docente, nombre_docente, doc_ident_docente, correo_docente, telefono_docente, password_docente, id_colegio, id_ruta) VALUES ('$id_doc', '$nombre_doc', '$doc_ident_doc', '$correo_doc', '$telefono_doc', '$password_doc', '$id_col', '$id_rut')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Docente registrado!");
                    window.location.href = "../registrar_docente.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>