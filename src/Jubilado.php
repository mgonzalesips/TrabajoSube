<?php
namespace TrabajoSube;

class Jubilado extends Tarjeta {
    const TARIFA = 0;

    public function pagarPasaje() {
        $this->saldo -= self::TARIFA;
    }

    public function realizarViajePlus() {
        $this->saldo -= self::TARIFA;
    }
    
}