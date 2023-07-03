<!DOCTYPE html>
<html>
<head>
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if (!empty($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="login.php">
        <label for="dni">Dni:</label>
        <input type="text" id="dni" name="dni" required><br><br>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
