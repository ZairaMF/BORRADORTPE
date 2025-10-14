<?php
require_once './app/model/viaje.model.php';
require_once './app/view/viaje.view.php';

define('MAX_PRIORITY', 5);

class TaskController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new viajeModel();
        $this->view = new viajeView();
    }
    
    function listarViajes() {
        // pido las tareas al modelo
        $viajes = $this->model->getViaje();

        // se las mando a la vista
        $this->view->verViajes($viajes);
    }
  
public function mostrarformViajes()
{
     $conductor = $this->model->getConductor();
    $this->view->formularioViaje($conductor);
}
public function addViaje() {
    

    // Verifica si se ha enviado el formulario
    if (!isset($_POST['fecha']) || empty($_POST['fecha']) ||
        !isset($_POST['origen']) || empty($_POST['origen']) ||
        !isset($_POST['destino']) || empty($_POST['destino']) ||
        !isset($_POST['ID_conductor']) || empty($_POST['ID_conductor']) ||
        !isset($_POST['ID_usuario']) || empty($_POST['ID_usuario'])) {
        return $this->view->error('Falta completar todos los campos obligatorios');
    }
    var_dump($_POST);

    // Asigna las variables correctamente
    $fecha = $_POST['fecha'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $ID_conductor = $_POST['ID_conductor'];
     $ID_usuario = $_POST['ID_usuario'];
    
    // Agrega el viaje a la base de datos
    $ID_viaje = $this->model->agregarViaje($fecha, $origen, $destino, $ID_conductor, $ID_usuario);

        if (!$ID_viaje) {
            return $this->view->error('Error al insertar viaje');
        } 

        // redirijo al home
        header('Location: ' . BASE_URL . 'listar');

}

}

