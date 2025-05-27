<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_col = $_POST['id_colegio'];
        $nombre_col = $_POST['nombre_colegio'];
        $municipio_col = $_POST['municipio_colegio'];
        $correo_col = $_POST['correo_colegio'];
        $telefono_col = $_POST['telefono_colegio'];
        $rector_col = $_POST['rector_colegio'];
        
        

        $query = "INSERT INTO Colegio(id_colegio, nombre_colegio, municipio_colegio, correo_colegio, telefono_colegio, rector_colegio) VALUES ('$id_col', '$nombre_col', '$municipio_col', '$correo_col', '$telefono_col', '$rector_col')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if ($insercion) {
            echo '<script type="text/javascript">
                    alert("Colegio registrado!");
                    window.location.href = "../registrar_colegio.php";
                  </script>';
        } else {
            echo "Error: " . mysqli_error($conexion);
        }
        
    }
?>