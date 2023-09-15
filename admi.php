<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $calle = $_POST['calle'];
    $metrosCuadrados = $_POST['metros_cuadrados'];
    $antiguedad = $_POST['antiguedad'];
    $disponibilidad = $_POST['disponibilidad'];
    $descripcion = $_POST['descripcion'];
    $complejo = $_POST['complejo']; // Obtén el complejo desde el formulario
    $cortinaMetalica = $_POST['cortina_metalica'];


    $imagenPaths = array();

    // Manejo de los archivos de imágenes
    foreach ($_FILES['imagenes']['tmp_name'] as $index => $imagenTmpPath) {
        $imagenNombre = $_FILES['imagenes']['name'][$index];
        $imagenPath = 'uploads/' . $imagenNombre;
        
        // Mover cada imagen al directorio de guardado
        if (move_uploaded_file($imagenTmpPath, $imagenPath)) {
            $imagenPaths[] = $imagenPath;
        } else {
            echo 'Error al subir la imagen ' . $imagenNombre . '<br>';
        }
    }

    // Insertar los datos del local en la base de datos
    $imagenPathsString = implode(',', $imagenPaths);
    $sql = "INSERT INTO locales (nombre, calle, metros_cuadrados, antiguedad, disponibilidad, descripcion, imagenes, complejo, cortina_metalica)
        VALUES ('$nombre', '$calle', '$metrosCuadrados', '$antiguedad', '$disponibilidad', '$descripcion', '$imagenPathsString', '$complejo' ,'$cortinaMetalica')";


    if ($conn->query($sql) === TRUE) {
        header('Location: inicio.php?status=success'); // Redirigir a la página de inicio
        exit();
    } else {
        echo 'Error al agregar el local: ' . $conn->error;
    }

    $conn->close();
}
?>
