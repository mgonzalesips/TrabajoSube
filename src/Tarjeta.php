<?php
namespace TrabajoSube;

function chequeoCarga($monto){
    $flag = false;
    $cargas = [150, 200, 250, 300, 350, 400, 450, 500, 
           600, 700, 800, 900, 1000, 1100, 1200, 1300, 
           1400, 1500, 2000, 2500, 3000, 3500, 4000];
           
    for ($i=0; $i <= sizeof($cargas) ; $i++) { 
        if($monto == $cargas[$i]) $flag = true;
    }
    return $flag;
}

class Tarjeta{
    public $saldo;
    
    public function __construct(){
        $this->saldo = 0;
    }

    public function cargarDinero($monto){
        $nuevosaldo = $this->saldo + $monto;
        if(chequeoCarga($monto) && $nuevosaldo <= 6600)
            return $this->saldo + $monto;
        else 
            return -1;
    }
}