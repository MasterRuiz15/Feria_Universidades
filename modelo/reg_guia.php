<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require 'conexion.php';
    session_start();

    if (isset($_SESSION['username'])) {

        // Asegúrate de que todos los campos POST existen
        if (isset($_POST['id_guia'], $_POST['nombre_guia'], $_POST['correo_guia'], $_POST['password_guia'])) {
            $id_guia = $_POST['id_guia'];
            $nombre_guia = $_POST['nombre_guia'];
            $correo_guia = $_POST['correo_guia'];
            $password_guia = $_POST['password_guia'];

            // Verifica si se subió una imagen correctamente
            if (isset($_FILES['foto_guia']) && $_FILES['foto_guia']['error'] === UPLOAD_ERR_OK) {
                $foto_binario = addslashes(file_get_contents($_FILES['foto_guia']['tmp_name']));

                // Verifica sintaxis correcta de la consulta SQL (sin coma de más)
                $query = "INSERT INTO Guia (id_guia, nombre_guia, correo_guia, password_guia, foto_guia) 
                          VALUES ('$id_guia', '$nombre_guia', '$correo_guia', '$password_guia', '$foto_binario')";

                $insercion = mysqli_query($conexion, $query);

                if ($insercion) {
                    echo '<script type="text/javascript">
                            alert("Guía registrado con éxito.");
                            window.location.href = "../registrar_guia.php";
                          </script>';
                } else {
                    echo "❌ Error en la inserción: " . mysqli_error($conexion);
                }
            } else {
                echo "❌ Error al subir la imagen.";
            }
        } else {
            echo "❌ Faltan datos del formulario.";
        }

    } else {
        echo "⚠️ Sesión no iniciada.";
    }
?>
