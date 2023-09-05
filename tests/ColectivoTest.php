<?php
namespace TrabajoSube\Tests;

use PHPUnit\Framework\TestCase;
use TrabajoSube\Colectivo;
use TrabajoSube\Tarjeta;
use TrabajoSube\Boleto;
use Exception;

class ColectivoTest extends TestCase
{
    public function testPagarConSaldoSuficiente()
    {
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta(200);

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertInstanceOf(Boleto::class, $boleto);
    }

    public function testGetTarifa()
    {
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta(200);

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals(120, $boleto->getTarifa());
    }

    public function testGetSaldo()
    {
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta(200);

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertEquals(80, $tarjeta->getSaldo());
    }

    public function testPagarConSaldoInsuficiente()
    {
        $colectivo = new Colectivo();
        $tarjeta = new Tarjeta(50);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Saldo insuficiente para pagar el pasaje.");

        $colectivo->pagarCon($tarjeta);
    }
}