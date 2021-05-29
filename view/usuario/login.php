<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/usuario/login.css">
</head>

<body>
<h1>Inicia Sesión</h1>
<div id="login">
    <form method="post" action="index.php?page=validar">

        <label for="usuario">Usuario</label>
        <input type="text" name="nombre" placeholder="Escriba su nombre de usuario" required>

        <label for="contraseña">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca contraseña" required>

        <input type="submit" value="Login">

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']) ?>
        <?php endif; ?>
    </form>
</div>

<div id="regreso">
    <a href="index.php">Regresar pantalla inicio</a>
</div>

</body>
</html>
