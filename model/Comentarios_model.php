<?php


class Comentarios_model extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = self::conectar();
    }

    public function getComentariosTema($idTema)
    {
        $sql = "SELECT comentarios.*, usuarios.nombre AS nombre_usuario,
                DATE_FORMAT(usuarios.date_add, '%d/%m/%Y %H:%i:%s') AS fecha_registro,
                DATE_FORMAT(comentarios.date_add, '%d/%m/%Y %H:%i:%s') AS fecha_creacion
                FROM comentarios
                JOIN usuarios ON comentarios.idUsuario = usuarios.idUsuario
                WHERE idTema = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idTema));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_column($result, null, 'idComentario');
    }

    public function getUltimoComentarioTema($idTema)
    {
        $sql = "SELECT comentarios.*, usuarios.nombre AS nombre_usuario, DATE_FORMAT(comentarios.date_add, '%d/%m/%Y %H:%i:%s') AS fecha_creacion
                FROM comentarios
                JOIN usuarios ON comentarios.idUsuario = usuarios.idUsuario
                WHERE idTema = ?
                ORDER BY date_add DESC
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idTema));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getNumeroComentariosTema($idTema)
    {
        $sql = "SELECT COUNT(*) AS numero FROM comentarios
                WHERE idTema = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idTema));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['numero'];
    }

    public function crearComentario($idTema, $idUsuario, $mensaje)
    {
        $sql = "INSERT INTO comentarios (idTema, idUsuario, mensaje) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($idTema, $idUsuario, $mensaje));

        return $this->db->lastInsertId();
    }
}