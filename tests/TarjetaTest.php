<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {
    public function testPagarBoleto() {
        $tarjeta = new Tarjeta();

        $saldo = $tarjeta->saldo;

        $costoBoleto = 120;

        $tarjeta->pagarBoleto($costoBoleto);

        $this->assertEquals($saldo-$costoBoleto, $tarjeta->saldo);
    }
}
