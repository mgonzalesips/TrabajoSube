<?php
namespace TrabajoSube;

class BoletoGratuito extends Tarjeta {
   

    public function pagarPasaje() {
        $this->saldo -= 0;
    }

    public function realizarViajePlus() {
        $this->saldo -= 0;
    }
}
?>