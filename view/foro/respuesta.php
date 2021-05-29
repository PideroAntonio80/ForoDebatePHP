<!DOCTYPE html>
<html>

<head>
    <title>respuesta</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/foro/respuesta.css">
</head>

<body>
    <div class="container">
        <h1>Tu respuesta</h1>
        <div class="respuesta">
            <form method="post" action="index.php?page=crear-nueva-respuesta&id=<?= $idTema ?>">

                <textarea class="mensaje" name="respuesta" required></textarea>

                <input class="boton" type="submit" value="responder">

            </form>
        </div>

        <div id="regreso">
            <a href="index.php?page=tema&id=<?= $idTema ?>">Regresar al tema</a>
        </div>
    </div>

</body>
</html>


