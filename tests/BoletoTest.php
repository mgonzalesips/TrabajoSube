<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase
{
    public function testConstructor()
    {
        $costo = 120;
        $saldo = 20;
        $linea = 'Línea cualquiera';
        $id = 3920;
        $fecha = 1551599;
        $beneficio = 'FranquiciaCompleta';

        $boleto = new Boleto($costo, $saldo, $linea, $id, $fecha, $beneficio);

        $this->assertEquals($costo, $boleto->costo);
        $this->assertEquals($saldo, $boleto->saldo_restante);
        $this->assertEquals($linea, $boleto->linea);
        $this->assertEquals($id, $boleto->id);
        $this->assertEquals($fecha, $boleto->fecha);
        $this->assertEquals($beneficio, $boleto->beneficio);
    }

}