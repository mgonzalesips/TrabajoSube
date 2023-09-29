<?php

namespace TrabajoSube;

class Boleto{

    private function generarBoleto($tarjeta){
        $texto = "Pago exitoso. Saldo restante: " . $tarjeta->saldo;
        return $texto;
    }

    public function imprimirBoleto($tarjeta){
        echo $this->generarBoleto($tarjeta);
    }

    public function saldoIns(){
        echo 'Saldo insuficiente.';
    }

}
