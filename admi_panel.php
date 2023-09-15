<?php
session_start(); // Inicia la sesión

// Verifica si el usuario no está autenticado
if (!isset($_SESSION['username'])) {
    header("Location: Login/index.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Agregar Local</title>
    <link rel="stylesheet" type="text/css" href="estilo_admi.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div clas="container">
    <form action="admi.php" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del Local:</label>
        <input type="text" name="nombre" required>

        <label for="calle">Calle:</label>
        <input type="text" name="calle" required>

        <label for="metros_cuadrados">Metros Cuadrados:</label>
        <input type="number" name="metros_cuadrados" required>

        <label for="antiguedad">Antigüedad:</label>
        <input type="text" name="antiguedad" required>

        <label for="imagenes">Imágenes:</label>
        <input type="file" id="imagenes" name="imagenes[]" accept="image/*" multiple required><br><br>

        <label for="complejo">Complejo:</label>
        <select id="complejo" name="complejo" required>
            <option value="Complejo NJ Calle 15 e/ 80 y 81">Complejo NJ - Calle 15 e/ 80 y 81</option>
            <option value="Complejo Nilson Calle 16 e/ 80 y 81 - 80 e/ 15 y 16">Complejo Nilson - Calle 16 e/ 80 y 81 - 80 e/ 15 y 16</option>
            <option value="Complejo NJ Calle 16 y 81">Complejo NJ - Calle 16 y 81</option>
        </select><br>
        <label for="cortina_metalica">Cortina Metálica:</label>
<select id="cortina_metalica" name="cortina_metalica" required>
    <option value="Si">Si</option>
    <option value="No">No</option>
</select><br>
            
        <select id="disponibilidad" name="disponibilidad" required>
            <option value="Disponible">Disponible</option>
            <option value="No disponible">No disponible</option>
        </select><br>
        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" required></textarea>

        <button type="submit">Agregar Local</button>
    </form>
    </div>
</body>
</html>
