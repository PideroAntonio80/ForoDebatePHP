<?php
session_start();
require_once('controller/Usuario.php');
require_once ('controller/Foro.php');


//primera página
if (!isset($_GET['page'])) {
    header('Location:index.php?page=temas');
}

//rutas
switch ($_GET['page']) {
    case 'login': Usuario::login(); break;
    case 'validar': Usuario::validar(); break;
    case 'registro': Usuario::registro(); break;
    case 'registrar': Usuario::registrar(); break;
    case 'logout': Usuario::logout(); break;

    case 'temas': Foro::temas(); break;
    case 'nuevo-tema': Foro::nuevoTema(); break;
    case 'crear-nuevo-tema': Foro::crearNuevoTema(); break;
    case 'tema': Foro::tema($_GET['id']); break;
    case 'nueva-respuesta': Foro::nuevaRespuesta($_GET['id']); break;
    case 'crear-nueva-respuesta': Foro::crearNuevaRespuesta($_GET['id']); break;
}
