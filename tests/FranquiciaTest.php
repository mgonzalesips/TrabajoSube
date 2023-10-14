<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class FranquiciaTest extends TestCase {

    public function testDiscountsRetiree() {
        $tarjetaRetiree = new Jubilado();
        $tarjetaRetiree->saldo = 1000;
        $tarjetaRetiree->pagarPasaje();
        $this->assertEquals($tarjetaRetiree->getSaldo(), 1000);
    }

    public function testDiscountsFreeTicket() {
        $freeTicket = new BoletoGratuito();
        $freeTicket->saldo = 1000;
        $freeTicket->pagarPasaje();
        $this->assertEquals($freeTicket->getSaldo(), 1000);
    }           

    public function testDiscountsHalfTicket() {
        $halfTicket = new MedioBoleto();
        $halfTicket->saldo = 1000;
        $halfTicket->pagarPasaje();
        $this->assertEquals($halfTicket->getSaldo(), 940);
    }
}
