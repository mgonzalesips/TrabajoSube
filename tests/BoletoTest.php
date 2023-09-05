<?php
namespace TrabajoSube\Tests;

use PHPUnit\Framework\TestCase;
use TrabajoSube\Boleto;

class BoletoTest extends TestCase
{
    public function testTarifaCorrecta()
    {
        $boleto = new Boleto(1000, 500);
        $this->assertEquals(500, $boleto->getTarifa());
    }

    public function testSaldoRestanteCorrecto()
    {
        $boleto = new Boleto(1000, 500);
        $this->assertEquals(500, $boleto->getSaldoRestante());
    }
}
