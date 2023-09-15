<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "id21265036_nj";
$password = "Pelegrini.8052";
$dbname = "id21265036_3d";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Iniciar sesión
session_start();

// Verificar si ya se ha iniciado sesión
if (isset($_SESSION['username'])) {
    header("Location:inicio_admi.php");
    exit();
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    // Consulta para verificar las credenciales
    $query = "SELECT * FROM login WHERE usuario = '$usuario' AND pass = '$pass'";
    $result = $conn->query($query);

    // Verificar si se encontraron resultados
    if ($result->num_rows == 1) {
        // Iniciar sesión y redirigir a la página de inicio
        $_SESSION['username'] = $usuario;
        header("Location:inicio_admi.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        $mensaje_error = "Credenciales incorrectas. Inténtalo nuevamente.";
    }
}

// Cerrar la conexión
$conn->close();
?>