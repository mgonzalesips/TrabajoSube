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
        $tarjeta = new Tarjeta(150); // Creamos una tarjeta con saldo de 150
        $colectivo = new Colectivo();

        $boleto = $colectivo->pagarCon($tarjeta);

        $this->assertInstanceOf(Boleto::class, $boleto); // Verificamos que se haya generado un boleto
        $this->assertEquals(120, $boleto->getTarifa()); // Verificamos el monto del boleto
        $this->assertEquals(30, $boleto->getSaldoRestante()); // Verificamos el saldo restante en la tarjeta
        $this->assertEquals(30, $tarjeta->getSaldo()); // Verificamos que el saldo de la tarjeta se haya actualizado
    }

    public function testPagarConSaldoInsuficiente()
    {
        $tarjeta = new Tarjeta(100); // Creamos una tarjeta con saldo de 100
        $colectivo = new Colectivo();

        $this->expectException(new Exception); // Esperamos una excepción
        $colectivo->pagarCon($tarjeta);
    }
}


?>