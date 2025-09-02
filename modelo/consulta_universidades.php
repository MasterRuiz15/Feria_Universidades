<?php
    // Habilitar la visualización de errores para depuración (desactivar en producción)
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    // Incluir el archivo de conexión a la base de datos
    require 'conexion.php'; // Asegúrate de que este archivo exista y tenga los datos de conexión correctos

    // Iniciar la sesión PHP para acceder a variables de sesión (como el nombre de usuario logueado)
    session_start();

    $nombre_usuario = ""; // Inicializar la variable del nombre de usuario
    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username']; // Obtener el nombre de usuario de la sesión
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Universidades - Feria de Universidades</title>
    <style>
        /* Estilos CSS básicos para la tabla */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .user-info {
            text-align: right;
            margin-bottom: 20px;
            font-weight: bold;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 25px auto;
            background-color: #fff;
            box-shadow: 0 2px 3px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff; /* Color azul para los encabezados */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .no-login-message {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Universidades Participantes</h1>
    <div class="user-info">
        <?php echo 'Usuario: ' . htmlspecialchars($nombre_usuario); ?>
    </div>

    <?php
        // Verificar si el usuario ha iniciado sesión antes de mostrar la información sensible
        if(isset($_SESSION['username']))
        {
            // 1. Definir la consulta SQL
            $query = "SELECT id_universidad, nombre_universidad, correo_universidad, telefono_universidad FROM Universidad";
            
            // 2. Ejecutar la consulta en la base de datos
            // Usamos mysqli_query() para una SELECT simple sin parámetros de usuario
            $resultado = mysqli_query($conexion, $query);
            
            // 3. Verificar si la consulta se ejecutó correctamente
            if (!$resultado) {
                // Si hay un error en la consulta, mostrarlo para depuración
                trigger_error("Error al consultar universidades: " . mysqli_error($conexion));
            } else {
                // 4. Mostrar los resultados en una tabla HTML
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                    echo "<th>ID Universidad</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Correo</th>";
                    echo "<th>Teléfono</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                
                // Iterar sobre cada fila de resultados y mostrarla en la tabla
                while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) // MYSQLI_ASSOC para obtener un array asociativo (nombre de columna como clave)
                {
                    echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_universidad']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['nombre_universidad']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['correo_universidad']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['telefono_universidad']) . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                // 5. Liberar el conjunto de resultados para liberar memoria
                mysqli_free_result($resultado);
            }
        }
        else
        {
            // Si el usuario no ha iniciado sesión, mostrar un mensaje o redirigir
            // header('location: ../index.php'); // Descomentar para redirigir
            echo '<p class="no-login-message">Debes iniciar sesión para ver la lista de universidades.</p>';
        }

        // 6. Cerrar la conexión a la base de datos al final del script
        mysqli_close($conexion);
    ?>
</body>
</html>