<?php
namespace TrabajoSube;

class Jubilado extends Tarjeta {
    

    public function pagarPasaje() {
        $this->saldo -= 0;
    }

    public function realizarViajePlus() {
        $this->saldo -= 120;
    }
    
}