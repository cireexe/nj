<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "id21264493_nj";
$password = "Pelegrini.8052";
$dbname = "id21264493_3d";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

// Consulta para insertar los datos en la base de datos
$query = "INSERT INTO login (usuario, pass) VALUES ('$usuario', '$pass')";

if ($conn->query($query) === TRUE) {
    echo "Registro exitoso. ¡Bienvenido!";
    // Redireccionar a la página de inicio
    header("Location:index.php");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al registrar: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>






