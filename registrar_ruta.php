<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Ruta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Registrar Ruta</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un apoyo-->
    <form action="modelo/reg_ruta.php" method="post" enctype="multipart/form-data">
    <h2>Apoyo</h2>
    <label for="">Código:</label> 
    <input type="text" name="id_ruta" required>
    <br><br>
    <label for="">Nombre:</label> 
    <input type="text" name="nombre_ruta" required>
    <br><br>
    <label for="">Guia::</label> 
        <?php
        
          if(isset($_SESSION['username']))

          { 
        
            $nombre_usuario = $_SESSION['username'];
            $Select_uni = // consultar departamentos registrados y ponerlos en una lista tipo select
            $query_dptos = "SELECT id_guia, nombre_guia FROM Guia ORDER BY nombre_guia ASC";

            $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

            echo "<select name='id_guia' required>";
            echo "<option value = '0'>Selecione un guia </option>";
            while($row = mysqli_fetch_array($consulta_dptos))
            {
                    echo '<option value = "'.$row['id_guia'].'">'.$row['nombre_guia'].'</option>';
            }
            echo "</select>";
         }
        ?>

<br><br>
<label for="">Acompañante:</label> 
        <?php
        
          if(isset($_SESSION['username']))

          { 
        
            $nombre_usuario = $_SESSION['username'];
            $Select_uni = // consultar departamentos registrados y ponerlos en una lista tipo select
            $query_dptos = "SELECT id_acompañante, nombre_acompañante FROM Acompañante ORDER BY nombre_acompañante ASC";

            $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

            echo "<select name='id_acompañante' required>";
            echo "<option value = '0'>Selecione un acompañante </option>";
            while($row = mysqli_fetch_array($consulta_dptos))
            {
                    echo '<option value = "'.$row['id_acompañante'].'">'.$row['nombre_acompañante'].'</option>';
            }
            echo "</select>";
         }
        ?>

    <br><br>
    <button type="submit">Registrar</button>
    <button onclick="history.back()">Volver</button>
</form>
</body>
</html>