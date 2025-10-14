
<?php 
class viajeView{

    function verViajes($viajes){
        require_once 'templates/viajelista.phtml';
    }
    function formularioViaje($conductor){
        require_once 'templates/formViaje.phtml';
    }
    function error(){
        echo "error";
    }
}

?>