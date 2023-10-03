<?php

namespace TrabajoSube;

class Boleto{

    public function generarBoleto($tarjeta){
        $texto = "Pago exitoso. Saldo restante: " . $tarjeta->saldo;
        return $texto;
    }

    public function saldoIns(){
        $texto = "Saldo insuficiente";
        return $texto;
    }

}
