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

    public function __construct(){
        $this->saldo = 0;
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
}