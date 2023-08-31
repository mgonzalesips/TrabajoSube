<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;
use TrabajoSube\Colectivo;
use TrabajoSube\Tarjeta;
use TrabajoSube\Boleto;
use Exception;

class ColectivoTest extends TestCase
{
    public function testPagarConSaldoSuficiente()
    {
        $tarjeta = new Tarjeta(150);
        $colectivo = new Colectivo();

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertInstanceOf(Boleto::class, $boleto);
        $this->assertEquals(120, $boleto->getTarifa());
        $this->assertEquals(30, $boleto->getSaldoRestante());
        $this->assertEquals(30, $tarjeta->getSaldo());
    }

    public function testPagarConSaldoInsuficiente()
    {
        $tarjeta = new Tarjeta(100);
        $colectivo = new Colectivo();

        $this->expectException(Exception::class);
        $colectivo->pagarCon($tarjeta);
    }

}


?>