<?php
// Verificar si el usuario ha iniciado sesión
session_start();
if (!isset($_SESSION["dni"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página de inicio</title>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION["dni"]; ?></h2>
    <p>Has iniciado sesión correctamente.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
