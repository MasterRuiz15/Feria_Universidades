<?php
require 'conexion.php';

$id = $_GET['id'];

$query = "SELECT foto_apoyo FROM Apoyo WHERE id_apoyo = '$id'";
$resultado = mysqli_query($conexion, $query);
$row = mysqli_fetch_assoc($resultado);

if ($row) {
    header("Content-type: image/jpeg"); // Ajusta si usas PNG
    echo $row['foto_apoyo'];
} else {
    echo "Imagen no encontrada.";
}
?>
