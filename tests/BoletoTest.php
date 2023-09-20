<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase
{
    public function testConstructor()
    {
        $costo = 10.0;
        $saldo = 20.0;
        $linea = 'Línea cualquiera';

        $boleto = new Boleto($costo, $saldo, $linea);

        $this->assertEquals($costo, $boleto->costo);
        $this->assertEquals($saldo, $boleto->saldo_restante);
        $this->assertEquals($linea, $boleto->linea);
    }
}