<?php
// Datos de conexión a la base de datos
$host = "sql102.infinityfree.com";  // Host de la base de datos proporcionado por InfinityFree
$usuario = "if0_37761188";         // Nombre de usuario de la base de datos
$contrasena = "Ninya07";           // Contraseña de la base de datos (tu contraseña de vPanel)
$base_datos = "if0_37761188_db_libreria"; // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
} else {
    //echo "Conexión exitosa";
}
?>