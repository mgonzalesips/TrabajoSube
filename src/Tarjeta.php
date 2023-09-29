<?php

namespace TrabajoSube;

class Tarjeta{

    private $saldoMin = 0;
    private $saldoMax = 6600;

    public function __construct($saldo){
        $this->saldo = $saldo;
    }

    public function cargaTarjeta($this, $carga){

        if(($this->saldo + $carga) > $this->saldoMax){
            echo 'Te pasaste del saldo maximo (6600)';
        }
        else if(!(($carga >= 150 and $carga <= 500 and ($carga % 50) == 0) or ($carga >= 600 and $carga <= 1500 and ($carga % 100) == 0) or ($carga >= 2000 and $carga <= 4000 and ($carga % 500) == 0))){
            echo 'Valor de carga invalido. Los valores validos son: 150, 200, 250, 300, 350, 400, 450, 500, 600, 700, 800, 900, 1000, 1100, 1200, 1300, 1400, 1500, 2000, 2500, 3000, 3500 o 4000';
        }
        else{
            $tarjeta->saldo = $tarjeta->saldo + $carga;
        }
    }

}
