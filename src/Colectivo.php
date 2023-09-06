<?php

namespace TrabajoSube;

class Colectivo{

    private $saldoMin = 0;
    private $costePasaje = 120;

    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $costePasaje) >= 0){
            $tarjeta->saldo = $tarjeta->saldo - $costePasaje;
        }
        else{
            echo 'Saldo insuficiente';
        }
    }

}
