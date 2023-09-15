<?php
include 'config.php';

if (isset($_GET['id'])) {
    $local_id = $_GET['id'];

    $sql = "DELETE FROM locales WHERE id = $local_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: inicio_admi.php?status=deleted'); // Redirigir a la página de inicio del administrador
        exit();
    } else {
        echo 'Error al eliminar el local: ' . $conn->error;
    }

    $conn->close();
}
?>
