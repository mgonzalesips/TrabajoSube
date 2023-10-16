<?php

namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
    
    public function __construct(){
        Tarjeta::__construct();
        $this->ultimopago = null;
        $this->cantboletos = 4;
        $this->dia = date("d", time());
    }
    
    public function renovarBoletos(){
        if($this->dia != date("d", time())){
            $this->cantboletos = 4;
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