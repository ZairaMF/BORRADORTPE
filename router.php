    <?php
    require './app/controller/viaje.controller.php';
    require './app/controller/conductor.controller.php';
    require './app/controller/auth.controller.php';

    require_once './app/middlewares/session.middleware.php';
    require_once './app/middlewares/guard.middleware.php';


    // base_url para redirecciones y base tag
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    $action = 'home'; // accion por defecto si no se envia ninguna
    if (!empty( $_GET['action'])) {
        $action = $_GET['action'];
    }

    
    // parsea la accion para separar accion real de parametros
    $params = explode('/', $action);
    $request = new StdClass();
    $request = (new SessionMiddleware())->run($request);

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


        //Elimina Viaje
        case 'eliminar':
            $controller = new TaskController();
            $controller->eliminarViaje($params[1]);
            break;

        // Ver mas viajeDetalle
        case 'verMasViajes':
            $controller = new TaskController();
            $controller->mostrarViaje($params[1]);
            break;
            
        case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller->logout($request);
        break;

        default: 
            echo "404 Page Not Found";
            break;
    }
