<?php

// Script para crear una conexion con la BD

// Parametros requeridos para la conexion con la base de datos

// Parametros BD local      

DEFINE('USER', 'root'); // Crea la constante USER con valor `root`
DEFINE('PW', '');
DEFINE('HOST', 'localhost');
DEFINE('BD', 'Feria_Universidades');

// Parametros BD remota (infinityfree)

/*DEFINE('USER', 'if0_38542093'); // Crea la constante USER con valor `root`
DEFINE('PW', 'nwnicolas');
DEFINE('HOST', 'sql100.infinityfree.com');
DEFINE('BD', 'if0_38542093_empresa');*/


// Establecer la conexion con la BD

$conexion = mysqli_connect(HOST, USER, PW, BD);


// Establecer conjunto de carateres para el hosting
mysqli_set_charset($conexion, "utf8mb4");

// Verificar la conexion con la BD
if (!$conexion)
{
    die("La conexion con la BD fallo: " + mysqli_error($conexion));
}
/*else
//{
//    die("Conexion exitosa a la BD!");   
}*/

?>