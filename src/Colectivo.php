<?php

namespace TrabajoSube;

class Colectivo{

    private $saldoMin = 0;
    private $costePasaje = 120;
    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $this->costePasaje) >= 0){
            $tarjeta->saldo = $tarjeta->saldo - $costePasaje;
            return $tarjeta->saldo;
        }
        else{
            $boleto->saldoIns();
        }
    }

}
