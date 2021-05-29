<?php
require_once ('model/Database.php');

class Usuarios_model extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = self::conectar();
    }


    public function getUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_column($result, null, 'idUsuario');
    }


    public function getUsuarioByNombre($nombre)
    {
        $sql = "SELECT * FROM usuarios
                WHERE nombre = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($nombre));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result === false ? null : $result;
    }
    

    public function insertUsuario($nombre, $email, $password) {
        $sql = "INSERT INTO usuarios(nombre, email, password) VALUES(?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($nombre, $email, password_hash($password, PASSWORD_DEFAULT)));

        return $this->db->lastInsertId();
    }
}