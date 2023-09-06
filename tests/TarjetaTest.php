<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;
use TrabajoSube\Tarjeta;

class TarjetaTest extends TestCase
{
    public function testSaldoInicialEsCorrecto()
    {
        $tarjeta = new Tarjeta(100);
        $this->assertEquals(100, $tarjeta->getSaldo());
    }

    public function testCargarSaldoValido()
    {
        $tarjeta = new Tarjeta(0);
        $tarjeta->cargarSaldo(500);
        echo $tarjeta->getSaldo();
        $this->assertEquals(500, $tarjeta->getSaldo());
    }

    public function testCargarSaldoInvalido()
    {
        $tarjeta = new Tarjeta(0);
        $tarjeta->cargarSaldo(7000);
        $this->assertEquals(0, $tarjeta->getSaldo());
    }

    public function testDescontarSaldo()
    {
        $tarjeta = new Tarjeta(1000);
        $tarjeta->descontarSaldo(200);
        $this->assertEquals(800, $tarjeta->getSaldo());
    }

    public function testDescontarSaldoMayorQueElSaldoActual()
    {
        $tarjeta = new Tarjeta(100);
        $tarjeta->descontarSaldo(200);
        $this->assertEquals(0, $tarjeta->getSaldo());
    }

    public function testVerifyMontoValido()
    {
        $tarjeta = new Tarjeta(0);
        $result = $tarjeta->verifyMonto(500);
        $this->assertTrue($result);
    }

    public function testVerifyMontoInvalido()
    {
        $tarjeta = new Tarjeta(0);
        $result = $tarjeta->verifyMonto(7000);
        $this->assertFalse($result);
    }

}


?>