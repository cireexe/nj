<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Número de WhatsApp al que se enviará el mensaje
    $numeroWhatsApp = '+542257580520'; // Cambiar al número deseado

    // Componer el mensaje con los detalles del formulario
    $mensajeWhatsApp = "Hola, soy $nombre $apellido. Mi teléfono es $telefono. $mensaje";

    // Generar el enlace para abrir WhatsApp con el mensaje predefinido
    $url = "https://wa.me/$numeroWhatsApp?text=" . urlencode($mensajeWhatsApp);

    // Redirigir al enlace de WhatsApp
    header("Location: $url");
    exit();
}
?>

