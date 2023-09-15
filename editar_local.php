<!DOCTYPE html>
<html>
<head>
    <title>Editar Local</title>
    <link rel="stylesheet" type="text/css" href="editar_local.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
    <?php
    session_start(); // Inicia la sesión

    // Verifica si el usuario no está autenticado
    if (!isset($_SESSION['username'])) {
        header("Location: Login/index.php"); // Redirige a la página de inicio de sesión
        exit();
    }
    ?>
        <?php
        include 'config.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $local_id = $_POST['local_id'];
            $nombre = $_POST['nombre'];
            $calle = $_POST['calle'];
            $metrosCuadrados = $_POST['metros_cuadrados'];
            $antiguedad = $_POST['antiguedad']; // Agrega la antiguedad
            $disponibilidad = $_POST['disponibilidad'];
            $descripcion = $_POST['descripcion']; // Nueva línea para obtener la descripción
            $cortinaMetalica = $_POST['cortina_metalica']; // Agrega la cortina metálica
            $complejo = $_POST['complejo']; // Agrega el complejo

            // Actualizar los datos del local en la base de datos
            $sql = "UPDATE locales SET nombre='$nombre', calle='$calle', metros_cuadrados='$metrosCuadrados', antiguedad='$antiguedad', disponibilidad='$disponibilidad', descripcion='$descripcion', cortina_metalica='$cortinaMetalica', complejo='$complejo' WHERE id=$local_id";
            
            if ($conn->query($sql) === TRUE) {
                header('Location: inicio_admi.php?status=updated'); // Redirigir a la página de inicio
                exit();
            } else {
                echo 'Error al actualizar el local: ' . $conn->error;
            }

            $conn->close();
        }

        if (isset($_GET['id'])) {
            $local_id = $_GET['id'];
            $sql = "SELECT * FROM locales WHERE id = $local_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <form method="post" action="">
            <input type="hidden" name="local_id" value="<?php echo $row['id']; ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
            <label for="calle">Calle:</label>
            <input type="text" name="calle" value="<?php echo $row['calle']; ?>"><br>
            <label for="metros_cuadrados">Metros Cuadrados:</label>
            <input type="number" name="metros_cuadrados" value="<?php echo $row['metros_cuadrados']; ?>"><br>
            <label for="antiguedad">Antigüedad:</label> <!-- Nuevo campo para la antigüedad -->
            <input type="text" name="antiguedad" value="<?php echo $row['antiguedad']; ?>"><br>
            <label for="disponibilidad">Disponibilidad:</label>
            <select name="disponibilidad">
                <option value="disponible" <?php if ($row['disponibilidad'] === 'disponible') echo 'selected'; ?>>Disponible</option>
                <option value="no disponible" <?php if ($row['disponibilidad'] === 'no disponible') echo 'selected'; ?>>No Disponible</option>
            </select><br>
            <label for="cortina_metalica">Cortina Metálica:</label> <!-- Nuevo campo para la cortina metálica -->
            <select name="cortina_metalica">
                <option value="Si" <?php if ($row['cortina_metalica'] === 'Si') echo 'selected'; ?>>Sí</option>
                <option value="No" <?php if ($row['cortina_metalica'] === 'No') echo 'selected'; ?>>No</option>
            </select><br>
            <label for="complejo">Complejo:</label>
        <select id="complejo" name="complejo" required>
            <option value="Complejo NJ Calle 15 e/ 80 y 81">Complejo NJ Calle 15 e/ 80 y 81</option>
            <option value="Complejo Nilson Calle 16 e/ 80 y 81 - 80 e/ 15 y 16">Complejo Nilson Calle 16 e/ 80 y 81 - 80 e/ 15 y 16</option>
            <option value="Complejo NJ Calle 16 y 81">Complejo NJ Calle 16 y 81</option>
        </select><br>
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea><br>
            <button type="submit">Guardar Cambios</button>
        </form>
        <?php 
            } else {
                echo 'Local no encontrado.';
            }
        }
        ?>
    </div>
</body>
</html>
