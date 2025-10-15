<?php
require_once './app/controller/viaje.controller.php';

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto si no se envia ninguna
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

switch ($params[0]) {
   case 'listar':
        $controller = new TaskController();
        $controller->listarViajes();
     break;
   
     //Muestra formulario Viaje
    case 'mostrarFormulario':
    $controller = new TaskController();
    $controller->mostrarformViajes(); // 👈 Muestra el formulario
    break;

    // Redirije al listar, ya que toma los datos para mandarlos a la base de datos 
   case 'agregarViaje':
    $controller = new TaskController();
    $controller->addViaje();
    break;

    case 'editarViaje':
        $controller = new TaskController();
        $controller->mostrarformEditViaje($params[1]);
        break;
    case 'update':
        $controller = new TaskController();
        $controller->updateViajes($params[1]);
        break;

    default: 
        echo "404 Page Not Found";
        break;
}
