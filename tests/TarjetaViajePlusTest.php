<?php
namespace TrabajoSube;

use PHPUnit\Framework\TestCase;

class TarjetaViajePlusTest extends TestCase {
    public function testDosViajesPlus() {
        //creo una tarjeta nueva(comienza con el saldo en 0, es decir va a tener dos viajes plus)
        $tarjeta = new Tarjeta();

        //pago 2 pasajes con saldo en 0 y verifico que ambos se pagan con el viaje plus

        $tarjeta->pagarPasaje();
        $this->assertEquals($tarjeta->getSaldo(), -120);
        $tarjeta->pagarPasaje();
        $this->assertEquals($tarjeta->getSaldo(), -240);
        //agote los saldos plus que tenia dispolibles (2)
        
        //intento pagar el tercero, ya con dos viajes plus en negativo y verifico que no me deja 

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Saldo insuficiente para realizar un viaje plus.");

        $tarjeta->realizarViajePlus();
    }
    /*
    public function testDescuentoViajePlus() {
        $tarjeta = new TarjetaViajePlus(300);

        $tarjeta->realizarViaje();
        $saldoDespuesViaje = $tarjeta->getSaldo();

        // Validamos que el saldo se descuente correctamente luego de otorgar el viaje plus.
        $this->assertEquals(88.16, $saldoDespuesViaje, '', 0.01); // Usamos una tolerancia de 0.01 debido a posibles errores de redondeo
    }*/
}
