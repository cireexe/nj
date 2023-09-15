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
?>
