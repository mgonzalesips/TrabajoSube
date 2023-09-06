<?php

namespace TrabajoSube;

class Boleto{

    private function generarTexto($tarjeta){
        private $texto = "Saldo restante: " . $tarjeta->saldo;
        return $texto;
    }

    public function imprimirTexto($tarjeta){
        echo generarTexto($tarjeta);
    }

}
