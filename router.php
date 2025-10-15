    <?php
    require './app/controller/viaje.controller.php';
    require './app/controller/conductor.controller.php';
    require './app/controller/auth.controller.php';

    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home'; // accion por defecto si no se envia ninguna
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    //$res = new Response();

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

        //Edita el viaje por ID
        case 'editarViaje':
            $controller = new TaskController();
            $controller->mostrarformEditViaje($params[1]);
            break;
        // Toma los datos pero no muestra nada
        case 'update':
            $controller = new TaskController();
            $controller->updateViajes($params[1]);
            break;

        /*case 'showLogin':
            $controller = new AuthController($res);
            $controller->showLogin();
            break;
        case 'login':
            $controller = new AuthController($res);
            $controller->login();
            break;
        case 'logout':
            $controller = new AuthController($res);
            $controller->logout();
            break;
    */
        default: 
            echo "404 Page Not Found";
            break;
    }
