<?php

namespace TrabajoSube;

class Boleto{

    public function generarBoleto($tarjeta){
        $texto = "Pago exitoso. Saldo restante: " . $tarjeta->saldo;
        return $texto;
    }

    public function saldoIns(){
        echo 'Saldo insuficiente';
        return FALSE;
    }

}
