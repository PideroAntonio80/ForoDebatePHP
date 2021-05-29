
<!DOCTYPE html>

<html lang="es">

<head>
    <title><?= $tema['nombre'] ?></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/foro/foro.css">
</head>

<body>
<div class="container">
    <h1 class="text-center"><?= $tema['nombre'] ?></h1>
    <div class="menu">
        <div class="menu-left">
            <a href="index.php?page=nueva-respuesta&id=<?= $tema['idTema'] ?>" class="button nueva-respuesta">Responder</a>
            <a href="index.php?page=temas" class="button">Regresar a temas</a>
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

    <div class="comentarios">
        <table>
            <tbody>
                <?php foreach (array_values($tema['comentarios']) as $k => $comentario): ?>
                    <tr class="comentario">
                        <td class="td-usuario">
                            <div>Usuario: <span class="usuario"><?= $comentario['nombre_usuario'] ?></span></div>
                            <div>Registrado: <span class="fecha"><?= $comentario['fecha_registro'] ?></span></div>
                        </td>
                        <td>
                            <?php if ($k == 0): ?>
                                <div class="titulo-tema"><?= $tema['nombre'] ?></div>
                            <?php else: ?>
                                <div class="titulo-tema">Re: <?= $tema['nombre'] ?></div>
                            <?php endif; ?>
                            <div> por <span class="usuario"><?= $comentario['nombre_usuario'] ?></span> el <span class="fecha"><?= $comentario['fecha_creacion'] ?></span></div>
                            <div>
                                <pre><?= $comentario['mensaje'] ?></pre>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


</body>

</html>
