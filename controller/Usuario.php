<?php
require_once('model/Usuarios_model.php');

class Usuario
{
    private static function access() {
        if (isset($_SESSION['usuario'])) {
            header('Location:index.php');
        }
    }

    public static function login()
    {
        self::access();
        require_once("view/usuario/login.php");
    }

    public static function validar()
    {
        $usuario_model = new Usuarios_model();
        $usuario = $usuario_model->getUsuarioByNombre($_POST['nombre']);

        if (is_null($usuario)) {
            $_SESSION['error'] = 'Usuario inexistente';
            header('Location:index.php?page=login');
        } elseif (!password_verify($_POST['password'], $usuario['password'])) {
            $_SESSION['error'] = 'Usuario y contraseña no válidos';
            header('Location:index.php?page=login');
        } else {
            $_SESSION['idUsuario'] = $usuario['idUsuario'];
            $_SESSION['usuario'] = $_POST['nombre'];
            header('Location:index.php?page=temas');
        }
    }

    public static function registro()
    {
        self::access();
        require_once("view/usuario/registro.php");
    }

    public static function registrar()
    {
        $usuario_model = new Usuarios_model();
        $usuario = $usuario_model->getUsuarioByNombre($_POST['nombre']);

        if (!is_null($usuario)) { //existe
            $_SESSION['error'] = 'El nombre de usuario <i>' . $_POST['nombre'] . '</i> ya existe';
            header('Location:index.php?page=registro');
        } else {
            if ($_POST['password'] != $_POST['password2']) {
                $_SESSION['error'] = 'Las contraseñas no coinciden';
                header('Location:index.php?page=registro');
            } else {
                $idUsuario = $usuario_model->insertUsuario($_POST['nombre'], $_POST['email'], $_POST['password']);
                $_SESSION['idUsuario'] = $idUsuario;
                $_SESSION['usuario'] = $_POST['nombre'];
                self::emailRegistro($_POST['email']);
                header('Location:index.php?page=temas');
            }
        }
    }


    public static function logout()
    {
        $_SESSION = array();
        session_destroy();
        header('Location:index.php');
    }


    private static function emailRegistro($destino)
    {
        $to = $destino;
        $subject = "Confirmacion de Registro";
        $message = "Gracias por registrarse en nuestro foro";

        mail($to, $subject, $message);
    }


}