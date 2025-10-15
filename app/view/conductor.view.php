<?php
class ConductorView {
    public function showFormularioViaje($conductores) {
        require './templates/viajes/formViaje.phtml';
    }

    public function listarViajes($viajes) {
        require './templates/viajes/viajeLista.phtml';
    }

    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}