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
    <title>Registrar docente</title>
</head>
<body>
    <h1>Registrar docente</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un apoyo-->
    <form action="modelo/reg_docente.php" method = "post">
        <h2>Docente</h2>
        <label for="">Código:</label> 
        <input type="text" name="id_docente" id="" required>
        <br><br>
        <label for="">Nombre:</label> 
        <input type="text" name="nombre_docente" id="" required>
        <br><br>
        <label for="">Doc: Ident:</label> 
        <input type="text" name="doc_ident_docente" id="" required>
        <br><br>
        <label for="">Correo:</label> 
        <input type="text" name="correo_docente" id="" required>
        <br><br>
        <label for="">Telefono:</label> 
        <input type="text" name="telefono_docente" id="" required>
        <br><br>
        <label for="">Password:</label> 
        <input type="text" name="password_docente" id="" required>
    
        <br><br>
        <label for="">Colegio:</label> 
        <?php
        
          if(isset($_SESSION['username']))

          { 
        
            $nombre_usuario = $_SESSION['username'];
            $Select_uni = // consultar departamentos registrados y ponerlos en una lista tipo select
            $query_dptos = "SELECT id_colegio, nombre_colegio FROM Colegio ORDER BY nombre_colegio ASC";

            $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

            echo "<select name = 'id_colegio' required/>";
            echo "<option value = '0'>Selecione un colegio </option>";
            while($row = mysqli_fetch_array($consulta_dptos))
            {
                    echo '<option value = "'.$row['id_colegio'].'">'.$row['nombre_colegio'].'</option>';
            }
            echo "</select>";
         }
        ?>
        

        <br><br>
        <label for="">Ruta:</label> 
        <?php
        
          if(isset($_SESSION['username']))

          { 
        
            $nombre_usuario = $_SESSION['username'];
            $Select_uni = // consultar departamentos registrados y ponerlos en una lista tipo select
            $query_dptos = "SELECT id_ruta, nombre_ruta FROM Ruta ORDER BY nombre_ruta ASC";

            $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

            echo "<select name = 'id_ruta' required/>";
            echo "<option value = '0'>Selecione una ruta </option>";
            while($row = mysqli_fetch_array($consulta_dptos))
            {
                    echo '<option value = "'.$row['id_ruta'].'">'.$row['nombre_ruta'].'</option>';
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