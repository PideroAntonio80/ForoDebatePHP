<!DOCTYPE html>
<html>
<head>
    <title>Formulario registro</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/usuario/registro.css">
</head>
<body>
<h1>Formulario de registro</h1>

<div id="formulario">

    <form method="post" action="index.php?page=registrar">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" placeholder="Escriba su nombre de usuario" required>

        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Escriba su Email" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Introduzca contraseña" required>

        <label for="password2">Contraseña</label>
        <input type="password" name="password2" placeholder="Repita la contraseña" required>

        <input type="submit" value="Enviar">

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