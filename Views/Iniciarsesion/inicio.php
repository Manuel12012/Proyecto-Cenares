<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h1>Iniciar sesión</h1>
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <form action="index.php?action=iniciarSesion" method="POST">
        <label for="dni">Dni:</label>
        <input type="text" id="dni" name="dni" required><br>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
