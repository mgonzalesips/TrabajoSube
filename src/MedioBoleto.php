<?php
namespace TrabajoSube;

class MedioBoleto extends Tarjeta {

    public function pagarPasaje() {
        $this->saldo -= 60;
    }

    public function realizarViajePlus() {
        $this->saldo -= 60;
    }
}
?>