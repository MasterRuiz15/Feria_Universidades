<?php
require 'conexion.php';
session_start();

if (isset($_SESSION['username'])) {
    $id_apo = $_POST['id_apoyo'];
    $nombre_apo = $_POST['nombre_apoyo'];
    $correo_apo = $_POST['correo_apoyo'];
    $password_apo = $_POST['password_apoyo'];
    $id_uni = $_POST['id_universidad'];

    // Asegúrate de que el archivo ha sido subido
    if (isset($_FILES['foto_apoyo']) && $_FILES['foto_apoyo']['error'] === UPLOAD_ERR_OK) {
        $foto_binario = addslashes(file_get_contents($_FILES['foto_apoyo']['tmp_name']));

        $query = "INSERT INTO Apoyo(id_apoyo, nombre_apoyo, correo_apoyo, password_apoyo, foto_apoyo, id_universidad) 
                  VALUES ('$id_apo', '$nombre_apo', '$correo_apo', '$password_apo', '$foto_binario', '$id_uni')";

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