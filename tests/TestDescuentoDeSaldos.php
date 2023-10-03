<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;
use TrabajoSube\Tarjeta;

class TestDescuentoDeSaldos extends TestCase
{
    public function testPagarConSaldo(){
        $colectivo = new Colectivo;
        $tarjeta = new Tarjeta;

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals('TrabajoSube\Boleto', get_class($boleto));
    }

    public function testPagarSinSaldo(){
        $tarjeta = new Tarjeta;
        $colectivo = new Colectivo;

        $boleto = $colectivo->pagarCon($tarjeta);
        $boletoInvalido = $colectivo->pagarCon($tarjeta);

        $this->assertFalse($boletoInvalido);
    }
}
?>