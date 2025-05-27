<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $id_del = $_POST['id_delegado'];
        $nombre_del = $_POST['nombre_delegado'];
        $correo_del = $_POST['correo_delegado'];
        $telefono_del = $_POST['telefono_delegado'];
        $password_del = $_POST['password_delegado'];
        $id_uni = $_POST['id_universidad'];


        

        $query = "INSERT INTO Delegado(id_delegado, nombre_delegado, correo_delegado, telefono_delegado, password_delegado, id_universidad) VALUES ('$id_del', '$nombre_del', '$correo_del', '$telefono_del', '$password_del', '$id_uni')";

        $insercion = mysqli_query($conexion, $query) or trigger_error("Error en la inserción de los datos: ".mysqli_error($conexion));

        if($insercion)
        {
            echo '<script type "text/javascript">
                    alert("Delegado registrado!");
                    window.location.href = "../registrar_delegado.php"
                </script>';
        }
        else
        {
            header('location: ../index.php');
        }
    }
?>