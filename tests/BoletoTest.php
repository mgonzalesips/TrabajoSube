<?php

namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class BoletoTest extends TestCase{
    public function testConstructor(){
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

    public function testGetCosto(){
        $boleto = new Boleto(120, 20, 'Línea cualquiera', 3920, 1551599, 'FranquiciaCompleta');
        $this->assertEquals(120, $boleto->getCosto());
    }

    public function testGetSaldoRestante(){
        $boleto = new Boleto(120, 20, 'Línea cualquiera', 3920, 1551599, 'FranquiciaCompleta');
        $this->assertEquals(20, $boleto->getSaldoRestante());
    }

    public function testGetID(){
        $boleto = new Boleto(120, 20, 'Línea cualquiera', 3920, 1551599, 'FranquiciaCompleta');
        $this->assertEquals(3920, $boleto->getID());
    }

    public function testGetFecha(){
        $boleto = new Boleto(120, 20, 'Línea cualquiera', 3920, 1551599, 'FranquiciaCompleta');
        $this->assertEquals(1551599, $boleto->getFecha());
    }

    public function testGetBeneficio(){
        $boleto = new Boleto(120, 20, 'Línea cualquiera', 3920, 1551599, 'FranquiciaCompleta');
        $this->assertEquals('FranquiciaCompleta', $boleto->getBeneficio());
    }

}