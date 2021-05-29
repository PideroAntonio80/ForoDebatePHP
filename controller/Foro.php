<?php
require_once ('model/Temas_model.php');


class Foro
{
    private static function access() {
        if (!isset($_SESSION['usuario'])) {
            header('Location:index.php?page=login');
        }
    }


    public static function temas()
    {
        $temas_model = new Temas_model();

        $temas = $temas_model->getTemasConInfo();
//        foreach ($temas as $idTema => $tema) {
//            if (empty($tema['comentarios'])) {
//                $ultimo_comentario = null;
//            } else {
//                $ultimo_comentario = end($tema['comentarios']); // end() avanza el puntero interno del array hasta su último elemento y devuelve su valor.
//            }
//            $temas[$idTema]['ultimo_comentario'] = $ultimo_comentario;
//        }

        require_once("view/foro/temas.php");
    }


    public static function nuevoTema()
    {
        self::access();
        require_once("view/foro/nuevoTema.php");
    }


    public static function crearNuevoTema()
    {
        $temas_model = new Temas_model();
        $idTema = $temas_model->crearTema($_SESSION['idUsuario'], $_POST['titulo']);
        $comentarios_model = new Comentarios_model();
        $comentarios_model->crearComentario($idTema, $_SESSION['idUsuario'], $_POST['respuesta']);
        header('Location:index.php?page=temas');
    }


    public static function tema($idTema)
    {
        $temas_model = new Temas_model();
        $tema = $temas_model->getTemaConRespuestas($idTema);

        require_once ("view/foro/tema.php");
    }


    public static function nuevaRespuesta($idTema)
    {
        self::access();
        require_once("view/foro/respuesta.php");
    }


    public static function crearNuevaRespuesta($idTema)
    {
        $comentarios_model = new Comentarios_model();
        $comentarios_model->crearComentario($idTema, $_SESSION['idUsuario'], $_POST['respuesta']);
        header('Location:index.php?page=tema&id=' . $idTema);
    }


}