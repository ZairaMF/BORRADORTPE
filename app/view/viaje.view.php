
<?php 
class viajeView{

    function verViajes($viajes){
        require_once 'templates/viajes/viajelista.phtml';
    }
    function formularioViaje($c){
        require_once 'templates/viajes/formViaje.phtml';
    }
    function formEditarViaje($ID_viaje, $viaje, $conductor, $conductores){
      require_once 'templates/viajes/formEditarViaje.phtml';
    }
    function mostrarErrores(){
        echo "error";
    }
}

?>