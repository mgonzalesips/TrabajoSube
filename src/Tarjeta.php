<?php
namespace TrabajoSube;

function chequeoCarga($monto){
    
    $cargas = [150, 200, 250, 300, 350, 400, 450, 500, 
           600, 700, 800, 900, 1000, 1100, 1200, 1300, 
           1400, 1500, 2000, 2500, 3000, 3500, 4000];
           
    for ($i=0; $i <= sizeof($cargas) ; $i++) { 
        if($monto == $cargas[$i]) return true;
    }
    return false;
}

class Tarjeta{
    public $saldo;
    public $minsaldo = ~211.84;
    public $maxsaldo = 6600;
    public $id;
    public $ultimoviaje;

    public function __construct($id = 0){
        $this->saldo = 0;
        $this->id = $id;
        $this->ultimoviaje = 0;
    }

    public function cargarDinero($monto){
        $nuevosaldo = $this->saldo + $monto;
        if(chequeoCarga($monto) && $nuevosaldo <= $this->maxsaldo){
            echo "Saldo actual: " . strval($nuevosaldo) . "\n";
            return $nuevosaldo;
        }
            
        else{
            echo "Error en la carga\n";
            return false;
        } 
    }

    public function viajaMedio($colectivo) {
        $tiempo_actual = time();
        if ($this->chequeoMedio($colectivo) && ($tiempo_actual - $this->ultimoviaje >= 300)) {
            $this->ultimoviaje = $tiempo_actual;
            $colectivo->pagarCon($this);
        } else {
            echo "ERROR, debe esperar al menos 5 minutos para abonar otro medio boleto\n";
        }
    }
}