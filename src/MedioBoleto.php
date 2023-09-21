<?php
namespace TrabajoSube;

class MedioBoleto extends Tarjeta {
    const TARIFA = 60;

    public function pagarPasaje() {
        $this->saldo -= self::TARIFA;
    }

    public function realizarViajePlus() {
        $this->saldo -= self::TARIFA;
    }
}
?>