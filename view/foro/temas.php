
<!DOCTYPE html>

<html lang="es">

<head>
    <title>temas</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/foro/foro.css">
</head>

<body>
<div class="container">
    <h1 class="text-center">FORO DE DEBATE</h1>
    <div class="menu">
        <div class="menu-left">
            <a href="index.php?page=nuevo-tema" class="button">Nuevo tema</a>
        </div>
        <div class="enlaces">
            <?php if (isset($_SESSION['usuario'])): ?>
                <span>Bienvenido: <?= $_SESSION['usuario'] ?></span>
                <a href="index.php?page=logout">Cerrar Sesión</a>
            <?php else: ?>
                <a href="index.php?page=login">Iniciar Sesión</a>
                <a href="index.php?page=registro">Registrarse</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="temas">
        <table>
            <thead>
                <tr>
                    <th>TEMAS</th>
                    <th>RESPUESTAS</th>
                    <th>ÚLTIMO MENSAJE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($temas as $idTema => $tema): ?>
                    <tr class="tema">
                        <td>
                            <a href="index.php?page=tema&id=<?= $idTema ?>" class="titulo"><?= $tema['nombre'] ?></a>
                            <div class="creacion">por <span class="usuario"><?= $tema['nombre_usuario'] ?></span> el <span class="fecha"><?= $tema['fecha_creacion'] ?></span></div>
                        </td>
                        <td class="text-center"><?= $tema['numero_comentarios'] - 1?></td>
                        <td>
                            <div> por <span class="usuario"><?= $tema['ultimo_comentario']['nombre_usuario']?></span></div>
                            <div class="fecha"><?=$tema['ultimo_comentario']['fecha_creacion'] ?></div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>
