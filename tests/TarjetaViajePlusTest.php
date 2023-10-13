<?php
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaViajePlusTest extends TestCase {
    public function testDosViajesPlus() {
        // Creo una tarjeta nueva (comienza con el saldo en 0, es decir, va a tener dos viajes plus)
        $tarjeta = new Tarjeta($fecha);
        $colecuop = new Colectivo('linea 115');
        $fecha = '1.1.1';
        
        // Pago 2 pasajes con saldo en 0 y verifico que ambos se pagan con el viaje plus
        $colecuop->pagarCon($tarjeta,$fecha);
        $this->assertEquals($tarjeta->getSaldo(),-120);
        $colecuop->pagarCon($tarjeta,$fecha);
        $this->assertEquals($tarjeta->getSaldo(),-240);
        // Agoté los saldos plus que tenía disponibles (2)

        // Intento pagar el tercero, ya con dos viajes plus en negativo y verifico que no me deja
        
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Saldo insuficiente para realizar un viaje plus.");
        $colecuop->pagarCon($tarjeta,$fecha);
    }

    public function testDescuentoViajePlus() {
        $tarjeta = new Tarjeta($fecha);

        // Realizamos un viaje plus
        $tarjeta->realizarViajePlus();

        // Verificamos que el saldo después del viaje plus sea correcto
        $this->assertEquals($tarjeta->getSaldo(), -120); // El saldo debe ser -120 después del viaje plus

        // Realizamos un segundo viaje plus
        $tarjeta->realizarViajePlus();

        // Verificamos que el saldo después del segundo viaje plus sea correcto
        $this->assertEquals($tarjeta->getSaldo(), -240); // El saldo debe ser -240 después del segundo viaje plus
    }
}
