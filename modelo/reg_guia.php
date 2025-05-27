<?php
require 'conexion.php';
session_start();

if (isset($_SESSION['username'])) {
    $id_guia = $_POST['id_guia'];
    $nombre_guia = $_POST['nombre_guia'];
    $correo_guia = $_POST['correo_guia'];
    $password_guia = $_POST['password_guia'];
    // Asegúrate de que el archivo ha sido subido
    if (isset($_FILES['foto_apoyo']) && $_FILES['foto_apoyo']['error'] === UPLOAD_ERR_OK) {
        $foto_binario = addslashes(file_get_contents($_FILES['foto_apoyo']['tmp_name']));

        $query = "INSERT INTO Guia(id_apoyo, nombre_guia, correo_guia, password_guia,) 
                  VALUES ('$id_guia', '$nombre_guia', '$correo_guia', '$password_guia', '$foto_binario')";

        $insercion = mysqli_query($conexion, $query);

        if ($insercion) {
            echo '<script type="text/javascript">
                    alert("Apoyo registrado con éxito.");
                    window.location.href = "../registrar_apoyo.php";
                  </script>';
        } else {
            echo "Error en la inserción: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al subir la imagen.";
    }
}
?>