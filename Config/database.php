<?php
// Configuración de la conexión a la base de datos
$host = "localhost";
$dbname = "bdcenares";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos";
} catch(PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}
?>
