<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Procesar el formulario (por ejemplo, enviar un correo)
    mail("tucorreo@dominio.com", "Nuevo mensaje de contacto", $mensaje, "From: $email");
}
?>
