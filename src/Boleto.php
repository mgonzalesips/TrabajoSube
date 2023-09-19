<?php

namespace TrabajoSube;

class Boleto{

    private function generarBoleto($tarjeta){
        private $texto = "Pago exitoso. Saldo restante: " . $tarjeta->saldo;
        return $texto;
    }

    public function imprimirBoleto($tarjeta){
        echo generarTexto($tarjeta);
    }

    public function saldoIns(){
        echo 'Saldo insuficiente.';
    }

}
