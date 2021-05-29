<?php
require_once ('model/Database.php');
require_once ('model/Comentarios_model.php');


class Temas_model extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = self::conectar();
    }


    public function getTemas()
    {
        $sql = "SELECT temas.*, usuarios.nombre AS nombre_usuario, DATE_FORMAT(temas.date_add, '%d/%m/%Y %H:%i:%s') AS fecha_creacion
                FROM temas
                JOIN usuarios ON temas.idUsuario = usuarios.idUsuario";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_column($result, null, 'idTema');
    }


    public function getTema($idTema)
    {
        $sql = "SELECT temas.*, usuarios.nombre AS nombre_usuario, DATE_FORMAT(temas.date_add, '%d/%m/%Y %H:%i:%s') AS fecha_creacion
                FROM temas
                JOIN usuarios ON temas.idUsuario = usuarios.idUsuario
                WHERE idTema = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idTema));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result === false ? null : $result;
    }


    public function getTemasConInfo()
    {
        $comentarios_model = new Comentarios_model();

        $temas = $this->getTemas();

        foreach ($temas as $idTema => $tema) {
            $ultimo_comentario = $comentarios_model->getUltimoComentarioTema($idTema);
            $numero_comentarios = $comentarios_model->getNumeroComentariosTema($idTema);
            $temas[$idTema]['ultimo_comentario'] = $ultimo_comentario;
            $temas[$idTema]['numero_comentarios'] = $numero_comentarios;
        }

        return $temas;
    }


    public function getTemaConRespuestas($idTema)
    {
        $comentarios_model = new Comentarios_model();

        $tema = $this->getTema($idTema);
        $tema['comentarios'] = $comentarios_model->getComentariosTema($idTema);

        return $tema;
    }


    public function crearTema($idUsario, $nombre)
    {
        $sql = "INSERT INTO temas (idUsuario, nombre) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idUsario, $nombre));

        return $this->db->lastInsertId();
    }
}