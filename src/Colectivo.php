<?php

namespace TrabajoSube;

class Colectivo{

    private $saldoMin = 0;
    private $costePasaje = 120;

    Tarjeta1 = new Tarjeta(200)
    
    public function pagarCon($tarjeta){
        if (($tarjeta->saldo - $costePasaje) >= 0){
            $tarjeta->saldo = $tarjeta->saldo - $costePasaje;
            $boleto->generarBoleto($tarjeta);
        }
        else{
            $boleto->saldoIns();
        }
    }

}
