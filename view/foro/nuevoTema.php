<!DOCTYPE html>
<html>

<head>
    <title>Nuevo tema</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/foro/nuevoTema.css">
</head>

<body>
<div class="container">
    <h1>Abre un nuevo tema</h1>
    <div class="respuesta">
        <form method="post" action="index.php?page=crear-nuevo-tema">

            <input class="titulo" name="titulo" type="text" placeholder="Título" required>

            <textarea class="mensaje" name="respuesta" placeholder="Escriba el primer comentario" required></textarea>

            <input class="boton" type="submit" value="Iniciar Tema">

        </form>
    </div>

    <div id="regreso">
        <a href="index.php?page=temas">Regresar a Temas</a>
    </div>
</div>

</body>
</html>