<?php
require_once './app/model/conductor.model.php';
require_once './app/view/conductor.view.php';

class conductorController{
    private $model;
    private $view;

    function __construct() {
        $this->model = new conductorModel();
        $this->view = new conductorView();
    }

    function showConductor() {
        // pido las tareas al modelo
        $conductor = $this->model->getConductor();

        // se las mando a la vista
        $this->view->showConductor($conductor);
    }

    function addConductor(){
        // Verifica si se ha enviado el formulario
    if (!isset($_POST['nombre']) || empty($_POST['nombre']) ||
        !isset($_POST['vehiculo']) || empty($_POST['vehiculo']) ) {
        return $this->view->showError('Falta completar todos los campos obligatorios');
    }

    // Asigna las variables correctamente
    $nombre = $_POST['nombre'];
    $vehiculo = $_POST['vehiculo'];

    
    // Agrega el viaje a la base de datos
    $this->model->agregarConductor($nombre, $vehiculo);
    
    // Redirige al listado de viajes
    header('Location: ' . BASE_URL . 'listar');
    }
}
?>