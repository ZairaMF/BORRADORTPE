<?php
require_once './app/model/usuario.model.php';
require_once './app/view/auth.view.php';

class AuthController {
    private $userModel;
    private $view;

    function __construct() {
        $this->userModel = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin($request) {
        $this->view->showLogin("", $request->user);
    }

    public function doLogin($request) {
        if(empty($_POST['usuario']) || empty($_POST['password']) || empty($_POST['gmail'])) {
            return $this->view->showLogin("Faltan datos obligatorios", $request->user);
        }

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $gmail = $_POST['gmail'];

        $userFromDB = $this->userModel->getByUser($user);

        if($userFromDB && password_verify($password, $userFromDB->password)) {
            $_SESSION['USER_ID'] = $userFromDB->ID_usuario;
            $_SESSION['USER_NAME'] = $userFromDB->usuario;
            $_SESSION['USER_GMAIL'] = $userFromDB->gmail;
            header("Location: ".BASE_URL."listar");
            return;
        } else {
            return $this->view->showLogin("Usuario o contraseña incorrecta", $request->usuario);
        }
    }

    public function logout($request) {
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."login");
        return;
    }


}
