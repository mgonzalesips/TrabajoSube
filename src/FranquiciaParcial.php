<?php

namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
    
    public function __construct(){
        Tarjeta::__construct();
        $this->ultimopago = null;
        $this->cantboletos = 4;
        $this->dia = date("d", time());
    }
    //Modificar esta funcion para que tambien funcione con TiempoFalso
    public function renovarBoletos($tiempo){
        $dia = date("d", $tiempo);
        if($this->dia != $dia){
            $this->cantboletos = 4;
            $this->dia = $dia;
        }
    }
    public $dia;
    public $ultimopago;
    public $cantboletos;

    public function hayBoletos() {
        if ($this->cantboletos > 0){
            return true;
        } 
        else{
            echo "ERROR, no tienes más boletos disponibles en tu tarjeta.\n";
            return false;
        }
    }

    public function pasoDelTiempo($tiempo){
        if (($tiempo - $this->ultimopago) >= 300 || $this->ultimopago === null) {
            return true;
        } else {
            echo "ERROR, debe esperar al menos 5 minutos para abonar otro medio boleto\n";
            return false;
        }
    }
}