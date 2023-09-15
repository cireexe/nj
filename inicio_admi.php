<?php
session_start(); // Inicia la sesión

// Verifica si el usuario no está autenticado
if (!isset($_SESSION['username'])) {
    header("Location:index.php"); // Redirige a la página de inicio de sesión
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio - Administrador</title>
    <link rel="stylesheet" type="text/css" href="inicio_admi.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="header">
        <h1>Administrar Locales</h1>
        <div class="add-local-button">
            <a href="admi_panel.php">Agregar Local</a>
            <a href="inicio.php">Volver al Inicio</a>
        </div>
    </div>
    
        <h2>Lista de Locales</h2>
        <div class="table-container">
            <table>
              
                <?php
                include 'config.php';

                $sql = "SELECT DISTINCT complejo FROM locales ORDER BY complejo";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $nombreComplejo = $row['complejo'];
                        echo '<h3 class="complejo-title">' . $nombreComplejo . '</h3>'; // Agregar título del complejo
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>Nombre</th>';
                        echo '<th>Calle</th>';
                        echo '<th>Metros Cuadrados</th>';
                        echo '<th>Disponibilidad</th>';
                        echo '<th>Cortina Metálica</th>';
                        echo '<th colspan="2">Acciones</th>';
                        echo '</tr>';
                
                        $sql_locales = "SELECT * FROM locales WHERE complejo = '$nombreComplejo'";
                        $result_locales = $conn->query($sql_locales);
                
                        if ($result_locales->num_rows > 0) {
                            while ($row_locales = $result_locales->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row_locales['nombre'] . '</td>';
                                echo '<td>' . $row_locales['calle'] . '</td>';
                                echo '<td>' . $row_locales['metros_cuadrados'] . '</td>';
                                echo '<td>' . $row_locales['disponibilidad'] . '</td>';
                                echo '<td>' . $row_locales['cortina_metalica'] . '</td>';
                                echo '<td><a href="editar_local.php?id=' . $row_locales['id'] . '" class="editar-button">Editar</a></td>';
                                echo '<td><a href="eliminar_local.php?id=' . $row_locales['id'] . '" class="delete-local-button">Eliminar</a></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="7">No hay locales disponibles para este complejo.</td></tr>';
                        }
                
                        echo '</table>';
                    }
                } else {
                    echo '<p>No hay complejos disponibles.</p>';
                }
                ?>
            </table>
        </div>
    

    <!-- Pie de página y otros elementos -->
<?php include 'footer.php'; ?>
</body>
</html>
